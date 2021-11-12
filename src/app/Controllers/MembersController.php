<?php

namespace App\Controllers;

use App\Models\Members;
use App\Models\Roles;
use App\Providers\Auth;
use Router\Router;

class MembersController extends Controller
{
    public function index()
    {
        $members = Members::where('role_id', Roles::where('slug', 'MEM')->first()->id)
            ->orderBy('name')->get();

        return $this->render('members', [
            'Auth' => Auth::class,
            'members' => $members,
            'user' => Auth::user()
        ]);
    }

    public function defineModerator($memberId)
    {
        $member = Members::find($memberId);

        if (isset($member)) {
            $member->role_id = Roles::where('slug', 'MOD')->first()->id;
            $member->save();
        }

        Router::redirect('members');
    }

    public function profile($id)
    {
        $user = Members::find($id);
        $captainTeam = [];
        foreach ($user->teams() as $team) {
            if ($team->captain()->id == $user->id) {
                $captainTeam[] = $team;
            }
        }
        return $this->render('profile',
            ['member' => $user,
                'captainTeam' => $captainTeam]);
    }

    public function editProfile($id)
    {
        $user = Members::find($id);
        $captainTeam = [];
        foreach ($user->teams() as $team) {
            if ($team->captain()->id == $user->id) {
                $captainTeam[] = $team;
            }
        }

        return $this->render('editprofile',
            ['member' => $user,
                'user' => Auth::user(),
                'captainTeam' => $captainTeam]);
    }

    public function changeName($id)
    {
        $user = Members::find($id);
        $user->name = htmlspecialchars($_POST['name']);
        try{
            $user->save();
        }catch (\PDOException $e){
            //TODO gérer doublons
        };

        Router::redirect('myprofile');
    }
}
