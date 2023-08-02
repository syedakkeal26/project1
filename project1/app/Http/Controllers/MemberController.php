<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    function index(){
        return Member::find(1)->getCompany;
    }

    function data(){
        return Company::find(1)->getMember;
    }

    function indexdata(){
        return Member::find(2)->getdevice;
    }
}
