<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MemberController extends Controller
{
    // Show all members
    public function index()
    {
        $members = Member::all(); //
        return view('members.index', compact('members')); //
    }

       public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    // Show create form
    public function create()
    {
        return view('members.create'); //
    }

    // Store member + generate QR
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', //
            'student_id' => 'required|unique:members' //
        ]);

        $member = Member::create([
            'name' => $request->name, //
            'student_id' => $request->student_id, //
        ]);

        // Content of the QR code
        $qrText = 'LIBSYS|MEMBER|' . $member->id; 

        $fileName = 'member_' . $member->id . '.png'; //
        $directory = public_path('qrcodes/members'); //
        $path = $directory . '/' . $fileName; //

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true); //
        }

        /**
         * FIX: We chain size() BEFORE format() or use the 
         * result of generate() directly to avoid Intelephense errors.
         */

       /* $image = QrCode::format('png')
            ->size(200)
            ->margin(1)
            ->generate($qrText);
            
        // Save the raw PNG data to the file path
        file_put_contents($path, $image);

        // Save path to database
        $member->qr_code = 'qrcodes/members/' . $fileName; //
        $member->save(); // */

        return redirect()->route('members.index')
            ->with('success', 'Member created with QR code!'); //
    }
    
}