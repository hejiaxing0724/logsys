<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject as AuthenticatableUserContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, AuthenticatableUserContract
{
    use Authenticatable,
        CanResetPassword,
        Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_name', 'email', 'password', 'active', 'first_name', 'last_name', 'ban', 'ext', 'mobile', 'profile_pic',
        'phone_number', 'company', 'agent_sign', 'account_type', 'account_status',
        'assign_group', 'primary_dpt', 'agent_tzone', 'daylight_save', 'limit_access',
        'directory_listing', 'vacation_mode', 'role', 'internal_note', 'country_code', 'not_accept_ticket', 'is_delete', 'mobile_verify', ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getProfilePicAttribute($value)
    {
        $info = $this->avatar();
        $pic = null;
        if ($info) {
            $pic = $this->checkArray('avatar', $info);
        }
        if (!$pic && $value) {
            $pic = '';
            $file = asset('uploads/profilepic/'.$value);
            if ($file) {
                $type = pathinfo($file, PATHINFO_EXTENSION);
                $data = file_get_contents($file);
                $pic = 'data:image/'.$type.';base64,'.base64_encode($data);
            }
        }
        if (!$value) {
            $pic = \Gravatar::src($this->attributes['email']);
        }

        return $pic;
    }

    public function avatar()
    {
        $related = 'App\UserAdditionalInfo';
        $foreignKey = 'owner';

        return $this->hasMany($related, $foreignKey)->select('value')->where('key', 'avatar')->first();
    }

    public function getOrganizationRelation()
    {
        $related = "App\Model\helpdesk\Agent_panel\User_org";
        $user_relation = $this->hasMany($related, 'user_id');
        $relation = $user_relation->first();
        if ($relation) {
            $org_id = $relation->org_id;
            $orgs = new \App\Model\helpdesk\Agent_panel\Organization();
            $org = $orgs->where('id', $org_id);

            return $org;
        }
    }

    public function getOrganization()
    {
        $name = '';
        if ($this->getOrganizationRelation()) {
            $org = $this->getOrganizationRelation()->first();
            if ($org) {
                $name = $org->name;
            }
        }

        return $name;
    }

    public function getOrgWithLink()
    {
        $name = '';
        $org = $this->getOrganization();
        if ($org !== '') {
            $orgs = $this->getOrganizationRelation()->first();
            if ($orgs) {
                $id = $orgs->id;
                $name = '<a href='.url('organizations/'.$id).'>'.ucfirst($org).'</a>';
            }
        }

        return $name;
    }

    public function getEmailAttribute($value)
    {
        if (!$value) {
            $value = \Lang::get('lang.not-available');
        }

        return $value;
    }

    public function getExtraInfo($id = '')
    {
        if ($id === '') {
            $id = $this->attributes['id'];
        }
        $info = new UserAdditionalInfo();
        $infos = $info->where('owner', $id)->pluck('value', 'key')->toArray();

        return $infos;
    }

    public function checkArray($key, $array)
    {
        $value = '';
        if (is_array($array)) {
            if (array_key_exists($key, $array)) {
                $value = $array[$key];
            }
        }

        return $value;
    }

    public function twitterLink()
    {
        $html = '';
        $info = $this->getExtraInfo();
        $username = $this->checkArray('username', $info);
        if ($username !== '') {
            $html = "<a href='https://twitter.com/".$username."' target='_blank'><i class='fa fa-twitter'> </i> Twitter</a>";
        }

        return $html;
    }

    public function name()
    {
        $first_name = $this->first_name;
        $last_name = $this->last_name;
        $name = $this->user_name;
        if ($first_name !== '' && $first_name !== null) {
            if ($last_name !== '' && $last_name !== null) {
                $name = $first_name.' '.$last_name;
            } else {
                $name = $first_name;
            }
        }

        return $name;
    }

    public function getFullNameAttribute()
    {
        return $this->name();
    }

//    public function save() {
//        dd($this->id);
//        parent::save();
//    }
//    public function save(array $options = array()) {
//        parent::save($options);
//        dd($this->where('id',$this->id)->select('first_name','last_name','user_name','email')->get()->toJson());
//    }

    public function org()
    {
        return $this->hasOne('App\Model\helpdesk\Agent_panel\User_org', 'user_id');
    }

    public function permision()
    {
        return $this->hasOne('App\Model\helpdesk\Agent\Groups', 'user_id');
    }

    public function save(array $options = [])
    {
        $changed = $this->isDirty() ? $this->getDirty() : false;
        $user = parent::save();
        $this->updateDeletedUserDependency($changed);

        return $user;
    }

    public function ticketsAssigned()
    {
        $related = 'App\Model\helpdesk\Ticket\Tickets';

        return $this->hasMany($related, 'assigned_to');
    }

    public function updateDeletedUserDependency($changed)
    {
        if ($changed && checkArray('is_delete', $changed) == 1) {
            $this->ticketsAssigned()->whereHas('statuses.type', function ($query) {
                $query->where('name', 'open');
            })->update(['assigned_to' => null]);
        }
    }

    public function isDeleted()
    {
        $is_deleted = $this->attributes['is_delete'];
        $check = false;
        if ($is_deleted) {
            $check = true;
        }

        return $check;
    }

    public function isBan()
    {
        $is_deleted = $this->attributes['ban'];
        $check = false;
        if ($is_deleted) {
            $check = true;
        }

        return $check;
    }

    public function isActive()
    {
        $is_deleted = $this->attributes['active'];
        $check = false;
        if ($is_deleted) {
            $check = true;
        }

        return $check;
    }

    public function isMobileVerified()
    {
        $is_deleted = $this->attributes['mobile_verify'];
        $check = false;
        if ($is_deleted) {
            $check = true;
        }

        return $check;
    }

    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();  // Eloquent model method
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
             'user' => [
                'id' => $this->id,
             ],
        ];
    }
}
