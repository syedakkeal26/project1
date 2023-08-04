<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    function index(){
        return Member::with('getCompany')->get();
    }
    function data(){
        return Company::find(1)->getMember;
    }

    function indexdata(){
        return Member::find(2)->getdevice;
    }
}
