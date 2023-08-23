<?php

namespace App\Http\Controllers;

use App\Models\Group\Group;
use App\Models\Group\GroupDetail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{

    public function groupExist(Request $request) {
        if(Group::where('group_token', $request->token)->get()->first() === null) {
            return json_encode(['token_exist' => false]);
        }
        return json_encode(['token_exist' => true]);
    }

    public function exitGroup() {
        $user = User::find(Auth::user()->id);
        GroupDetail::where('user_id','=',$user->id)->delete();
        User::find(Auth::user()->id)->update([
            'has_group' => false
        ]);

        return redirect()->back();
    }

    static function createGroup() {
        $tokenLength = random_int(32,64);
        $token = "";
        do {
            $token = Str::random($tokenLength);
        } while(Group::where('group_token', $token)->get()->first() !== null);

        $newGroup = Group::create([
            "group_token" => $token
        ]);

        GroupDetail::create([
            "group_id" => $newGroup->id,
            "user_id" => Auth::user()->id
        ]);

        User::find(Auth::user()->id)->update([
            'has_group' => true
        ]);

        return redirect()->back();
    }

    static function validateJoin($group) {
        if(GroupDetail::where("user_id", Auth::user()->id)->get()->first() != null) {
            return false;
        } else if (GroupDetail::where("group_id", $group->id)->get()->count() >= 3) {
            return false;
        }

        return true;
    }

    public function groupCapacities(Request $request) {
        if (Group::where("group_token", $request->token )->get()->first()->groupDetail()->get()->count() >= 3) {
            return json_encode(['capacities_status' => false]);
        }
        return json_encode(['capacities_status' => true]);
    }

    static function joinGroup($token) {
        $group = Group::where("group_token", $token)->get()->first();

        if($group !== null && GroupController::validateJoin($group)) {
            GroupDetail::create([
                "group_id" => $group->id,
                "user_id" => Auth::user()->id
            ]);

            User::find(Auth::user()->id)->update([
                'has_group' => true
            ]);
        }
    }
}
