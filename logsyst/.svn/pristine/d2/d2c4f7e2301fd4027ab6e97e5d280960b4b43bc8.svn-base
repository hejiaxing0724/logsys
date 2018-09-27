<?php

namespace App\Http\Controllers\Agent\helpdesk;

// controllers
use App\Http\Controllers\Common\FileuploadController;
use App\Http\Controllers\Common\NotificationController as Notify;
use App\Http\Controllers\Common\PhpMailController;
use App\Http\Controllers\Controller;
// requests
use App\Http\Requests\helpdesk\CreateTransactionRequest;
use App\Http\Requests\helpdesk\TicketRequest;
// models
use App\Model\helpdesk\Agent\Department;
use App\Model\helpdesk\Agent\Teams;
use App\Model\helpdesk\Email\Emails;
use App\Model\helpdesk\Manage\Help_topic;
use App\Model\helpdesk\Manage\Sla_plan;
use App\Model\helpdesk\Manage\Tickettype;
use App\Model\helpdesk\Notification\Notification;
use App\Model\helpdesk\Notification\UserNotification;
use App\Model\helpdesk\Settings\Alert;
use App\Model\helpdesk\Settings\CommonSettings;
use App\Model\helpdesk\Settings\Company;
use App\Model\helpdesk\Settings\Email;
use App\Model\helpdesk\Settings\System;
use App\Model\helpdesk\Ticket\Ticket_Thread;
use App\Model\helpdesk\Transaction\Transactions;
use App\Model\helpdesk\Utility\CountryCode;
use App\Model\helpdesk\Utility\Date_time_format;
use App\Model\helpdesk\Utility\Timezones;
use App\User;
use Auth;
use DB;
// classes
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\support\Collection;
use Input;
use Lang;
use Mail;
use PDF;

/**
 * TicketController.
 *
 * @author      Ladybird <info@ladybirdweb.com>
 */
class TransactionController extends Controller
{
    protected $transaction_policy;

    /**
     * Create a new controller instance.
     *
     * @return type response
     */
    public function __construct()
    {
        $this->PhpMailController = new PhpMailController();
        $this->NotificationController = new Notify();
        $this->middleware('auth');
        $this->transaction_policy = new \App\Policies\TransactionPolicy();
    }

    /**
     * @category function to return ticket view page
     *
     * @param null
     *
     * @return repsone/view
     */

    public function transactionlist(){
        $table = $this->getTableFormat();
        $transaction_policy = $this->transaction_policy;
        return view('themes.default1.agent.helpdesk.transaction.transactionlist', compact('table', 'transaction_policy'));
    }

    /**
     * @category function to return datatable object
     *
     * @param null
     *
     * @return object
     */
    public function getTableFormat()
    {
        return \Datatable::table()
            ->addColumn(
                '<a class="checkbox-toggle"><i class="fa fa-square-o fa-2x"></i></a>', Lang::get('lang.agentname'),Lang::get('lang.createdate'),Lang::get('lang.AWB_NO')
            )
            ->noScript();
    }

    /**
     * Show the New ticket page.
     *
     * @return type response
     */
    public function newtransaction()
    {
        if (!$this->transaction_policy->create()) {
            return redirect('dashboard')->with('fails', Lang::get('lang.permission-denied'));
        }

        return view('themes.default1.agent.helpdesk.transaction.new');
    }

    /**
     * Save the data of new ticket and show the New ticket page with result.
     *
     * @param type CreateTicketRequest $request
     *
     * @return type response
     */
    public function post_newtransaction(CreateTransactionRequest $request, $api = true)
    {
        if (!$this->transaction_policy->create()) {
            if ($api) {
                return response()->json(['message' => Lang::get('lang.permission_denied')], 403);
            }

            return redirect('dashboard')->with('fails', Lang::get('lang.permission_denied'));
        }
        $AWB_NO = "";
        if ($request->has('AWB_NO')) {
            $AWB_NO = $request->input('AWB_NO');
        }
        $AGENT_NO = "";
        if ($request->has('AGENT_NO')) {
            $AGENT_NO = $request->input('AGENT_NO');
        }
        $user_id = "";
        if ($request->has('user_id')) {
            $user_id = $request->input('user_id');
        }
        $memo = "";
        if ($request->has('memo')) {
            $memo = $request->input('memo');
        }

        $status = $this->saveTransaction($user_id,$AWB_NO,$AGENT_NO,$memo,$api);
        switch($status){
            case 200:
                return response()->json(['success' => $status['message']],$status['code']);
                break;
            case 500:
                return response()->json(['error' => $status['message']], $status['code']);
                break;
            case 403:
                return response()->json(['message' => $status['message']],$status['code']);
                break;
            case 999:
                return Redirect()->back()->with('fails', $status['message']);
                break;
        }

    }

    public function saveTransaction($user_id,$AWB_NO,$AGENT_NO,$memo,$api){
        $result = array();
        if(!$this->checkREC($AWB_NO,$AGENT_NO)){
            try {
                $Transactions = new Transactions();
                $Transactions->user_id = $user_id;
                $Transactions->AGENT_NO = $AGENT_NO;
                $Transactions->AWB_NO = $AWB_NO;
                $Transactions->memo = $memo;
                $Transactions->save();
                $result['code'] = 200;
                $result['message'] = Lang::get('lang.transaction_add_success');
            } catch (Exception $e) {
                if ($api) {
                    $result['code'] = 500;
                    $result['message'] = $e->getMessage();
                }
                $result['code'] = 999;
                $result['message'] = $e->getMessage();
            }
        }
        else {
            $result['code'] = 403;
            $result['message'] = Lang::get('lang.transaction_exist');
        }
        return $result;
    }

    /**
     * check email for dublicate entry.
     *
     * @param type $email
     *
     * @return type bool
     */
    public function checkREC($AWB_NO,$AGENT_NO)
    {
        $check = Transactions::where('AWB_NO', '=', $AWB_NO)->orWhere('AGENT_NO', $AGENT_NO)->first();
        if ($check == true) {
            return $check;
        }
        return false;
    }

    public function size()
    {
        $files = Input::file('attachment');
        if (!$files) {
            throw new \Exception('file size exceeded');
        }
        $size = 0;
        if (count($files) > 0) {
            foreach ($files as $file) {
                $size += $file->getSize();
            }
        }

        return $size;
    }

    public function error($e, $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $error = $e->getMessage();
            if (is_object($error)) {
                $error = $error->toArray();
            }

            return response()->json(compact('error'));
            //return $message;
        }
    }


    /**
     * to get user date time format.
     *
     * @return string
     */
    public static function getDateTimeFormat()
    {
        $set = System::select('date_time_format')->whereId('1')->first();

        return $set->date_time_format;
    }

    public function checkArray($key, $array)
    {
        $value = '';
        if (array_key_exists($key, $array)) {
            $value = $array[$key];
        }

        return $value;
    }

    public function getAdmin()
    {
        $users = new \App\User();
        $admin = $users->where('role', 'admin')->first();

        return $admin;
    }


    public function attachmentSeperate($thread_id)
    {
        if ($thread_id) {
            $array = [];
            $attachment = new Ticket_attachments();
            $attachments = $attachment->where('thread_id', $thread_id)->get();
            if ($attachments->count() > 0) {
                foreach ($attachments as $key => $attach) {
                    $array[$key]['file_path'] = $attach->file;
                    $array[$key]['file_name'] = $attach->name;
                    $array[$key]['mime'] = $attach->type;
                    $array[$key]['mode'] = 'data';
                }
                return $array;
            }
        }
    }


}
