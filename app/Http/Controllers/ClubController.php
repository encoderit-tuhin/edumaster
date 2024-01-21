<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use App\ClubMembers;
use App\ClubModerator;
use App\Club;
use App\NavigationItem;
use App\Traits\SluggableTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{
    use SluggableTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $users = User::whereIn('user_type',['Teacher','Student'])->get();
        $users = User::all();
        $clubs = Club::all();
        return view('backend.clubs.index', compact('clubs', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users =  $users = User::all();;

        return view('backend.clubs.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'slogan' => 'required|string|max:50',
            'slug' => 'nullable|string|unique:clubs',
            'foundation_date' => 'string',
            'history' => 'required|string',
            'activity' => 'required|string',
            'mission_vision' => 'nullable|string',
            'achievement' => 'nullable|string',
            'fb_link' => 'nullable|string',
            'logo' => 'nullable|image|max:5120',
            'banner_image' => 'nullable|image|max:5120',
        ]);

        $club = new Club();
        $club->name = $request->name;
        $club->slogan = $request->slogan;
        $club->foundation_date = $request->foundation_date;
        $club->history = $request->history;
        $club->mission_vision = $request->mission_vision;
        $club->achievement = $request->achievement;
        $club->activity = $request->activity;
        $club->fb_link = $request->fb_link;
        $club->status = 1;
        $club->slug = $this->createUniqueSlug($request->name, 'clubs', 'slug');


        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $LogoName = time() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(160, 160)->save(base_path('public/uploads/images/clubs/') . $LogoName);
            $club->logo = $LogoName;
        }
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . '.' . $bannerImage->getClientOriginalExtension();
            Image::make($bannerImage)->resize(640, 440)->save(base_path('public/uploads/images/clubs/') . $bannerImageName);
            $club->banner_image = $bannerImageName;
        }



        if ($club->save()) {
            // Add members.
            if (count($request->member_ids ?? [])) {
                foreach ($request->member_ids as $key => $user) {
                    // Check if the user is already a moderator for the club
                    $existingModerator = ClubModerator::where('club_id', $request->club_id)
                        ->where('user_id', $user)
                        ->first();

                    if (!$existingModerator) {
                        // If the user is not a moderator, insert them as one
                        $clubModerator = new ClubModerator();
                        $clubModerator->club_id = $club->id;
                        $clubModerator->user_id = $user;
                        $clubModerator->save();
                    }
                }
            }

            // Add moderators.
            if (count($request->moderator_ids ?? [])) {
                foreach ($request->moderator_ids as $key => $user) {
                    // Check if the user is already a member for the club
                    $existingMembers = ClubMembers::where('club_id', $request->club_id)
                        ->where('user_id', $user)
                        ->first();

                    if (!$existingMembers) {
                        // If the user is not a member, insert them as one
                        $clubMember = new ClubMembers();
                        $clubMember->club_id = $club->id;
                        $clubMember->user_id = $user;
                        $clubMember->save();
                    }
                }
            }

            // Save this club to page navigation item.
            $this->updateOrCreateNavigationItem(2, $club->slug, $club);

            // $matchCriteria = ['navigation_id' => 2, 'link' => '/club/' . $club->slug];
            // NavigationItem::updateOrCreate(
            //     $matchCriteria,
            //     [
            //         'menu_label' => $club->name,
            //         'link' => '/club/' . $club->slug,
            //         'menu_order' => $club->id,
            //         'navigation_id' => 2, // header Menu
            //         'parent_id' => 21, // curriculum submenu
            //     ]
            // );
        }

        return redirect('clubs')->with('success', _lang('Information has been added'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $club =  Club::find($id);
        return view('backend.clubs.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)

    {
        $users =  $users = User::all();
        $club = Club::find($id);
        $moderators = $club->moderators;
        $members = $club->members;

        $moderators = $club->moderators;
        return view('backend.clubs.edit', compact('club', 'users', 'moderators', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'slug' => 'nullable|string|unique:clubs,slug,' . $id,
            'slogan' => 'required|string|max:50',
            'foundation_date' => 'string',
            'history' => 'required|string',
            'activity' => 'required|string',
            'mission_vision' => 'nullable|string',
            'achievement' => 'nullable|string',
            'fb_link' => 'nullable|string',
            'logo' => 'nullable|image|max:5120',
            'banner_image' => 'nullable|image|max:5120',
        ]);

        $club =  Club::find($id);
        if (!$club) {
            return redirect()->back()->with('error', "Club Not Found");
        }

        $previousSlug = $club->slug;
        $club->name = $request->name;
        $club->slogan = $request->slogan;
        $club->foundation_date = $request->foundation_date;
        $club->mission_vision = $request->mission_vision;
        $club->history = $request->history;
        $club->achievement = $request->achievement;
        $club->fb_link = $request->fb_link;
        $club->activity = $request->activity;

        $club->slug = $request->slug;


        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $LogoName = time() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(160, 160)->save(base_path('public/uploads/images/clubs/') . $LogoName);
            $club->logo = $LogoName;
        }
        if ($request->hasFile('banner_image')) {
            $bannerImage = $request->file('banner_image');
            $bannerImageName = time() . '.' . $bannerImage->getClientOriginalExtension();
            Image::make($bannerImage)->resize(640, 440)->save(base_path('public/uploads/images/clubs/') . $bannerImageName);
            $club->banner_image = $bannerImageName;
        }


        if ($club->save()) {
            if (count($request->moderator_ids ?? [])) {
            ClubModerator::where('club_id', $club->id)
                ->delete();
            // delete all moderator

            //    add moderator
            foreach ($request->moderator_ids as $key => $moderator) {

                $clubModerator = new ClubModerator();
                $clubModerator->club_id = $club->id;
                $clubModerator->user_id = $moderator;
                $clubModerator->save();
            }
        }
        if (count($request->member_ids ?? [])) {
            ClubMembers::where('club_id', $club->id)
                ->delete();

            //    add members
            foreach ($request->member_ids as $key => $member) {
                // Check if the user is already a member for the club

                // If the user is not a member, insert them as one
                $clubMember = new ClubMembers();
                $clubMember->club_id = $club->id;
                $clubMember->user_id = $member;
                $clubMember->save();
            }
        }
            //    add moderator
            // Save this club to page navigation item.
           $this->updateOrCreateNavigationItem(2, $previousSlug, $club);

            // $matchCriteria = ['navigation_id' => 2, 'link' => '/club/' . $previousSlug];
            // NavigationItem::updateOrCreate(
            //     $matchCriteria,
            //     [
            //         'menu_label' => $club->name,
            //         'link' => '/club/' . $club->slug,
            //         'menu_order' => $club->id,
            //         'navigation_id' => 2, // header Menu
            //         'parent_id' => 21, // curriculum submenu
            //     ]
            // );
        }
        return redirect('clubs')->with('success', _lang('Information has been added'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $club =  Club::find($id);
        if (!$club) {
            abort(404);
        }
        $club->delete();

        return redirect('clubs')->with('success', _lang('Information has been deleted'));
    }

    public function updateStatus(Request $request)
    {
        $id = intval($request->id);

        $club = Club::find($id);
        if (!$club) {
            return redirect()->back()->with('error', _lang('Club Not Found'));
        }

        $club->status = $request->status;
        $club->save();
        return redirect()->back()->with('success', _lang('Information has been updated'));
    }
    function updateOrCreateNavigationItem($navigationId, $previousSlug, $club) {
        $matchCriteria = ['navigation_id' => $navigationId, 'link' => '/club/' . $previousSlug];
    
        NavigationItem::updateOrCreate(
            $matchCriteria,
            [
                'menu_label' => $club->name,
                'link' => '/club/' . $club->slug,
                'menu_order' => $club->id,
                'navigation_id' => $navigationId, // header Menu
                'parent_id' => 21, // curriculum submenu
            ]
        );
    }
}
