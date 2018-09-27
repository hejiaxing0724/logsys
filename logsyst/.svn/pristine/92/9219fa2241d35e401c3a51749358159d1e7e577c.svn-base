<?php

namespace App\Model\helpdesk\Transaction;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['id', 'user_id', 'AGENT_NO', 'AWB_NO', 'status', 'closed', 'closed_at', 'memo', 'otime'];

    public $notify = true;
    public $system = false;
    public $send = true;
    public $event = false;

    public function delete()
    {
        //$this->thread()->delete();
        parent::delete();
    }




    public function user()
    {
        $related = "App\User";
        $foreignKey = 'user_id';

        return $this->belongsTo($related, $foreignKey);
    }



    public function save(array $options = [])
    {
        $changed = $this->isDirty() ? $this->getDirty() : false;
        $id = $this->id;
        $model = $this->find($id);
        $save = parent::save($options);
        if ($this->notify) {
            $array = ['changes' => $changed, 'model' => $model, 'system'=>  $this->system, 'send_mail'=>  $this->send];
            \Event::fire('notification-saved', [$array]);
        }

        return $save;
    }

/*
    public function thread()
    {
        return $this->hasMany('App\Model\helpdesk\Ticket\Ticket_Thread', 'ticket_id');
    }


    public function extraFields()
    {
        $id = $this->attributes['id'];
        $ticket_form_datas = \App\Model\helpdesk\Ticket\Ticket_Form_Data::where('ticket_id', '=', $id)->get();

        return $ticket_form_datas;
    }

    public function sources()
    {
        return $this->belongsTo('App\Model\helpdesk\Ticket\Ticket_source', 'source');
    }


    public function sourceCss()
    {
        $css = 'fa fa-comment';
        $source = $this->sources();
        if ($source->first()) {
            $css = $source->first()->css_class;
        }

        return $css;
    }

    public function filter()
    {
        $related = 'App\Model\helpdesk\Filters\Filter';

        return $this->hasMany($related, 'ticket_id');
    }
*/



}
