<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Problem;
use App\Models\Repair;
use App\Models\SModel;
use App\Models\SparePart;
use App\Models\User;
use App\Models\UserModel;

class DashboardController extends Controller
{

    public function index()
    {
        $users = User::all();
        $technical = $users->Where('user_type', '=', 'technical')->count();
        $agent = $users->Where('user_type', '=', 'agent')->count();
        $customer = $users->Where('user_type', '=', 'customers')->count();
        $brand = Brand::all()->count();
        $category = Category::all()->count();
        $spare_part = SparePart::all()->count();
        $model = SModel::all()->count();
        $problems = Problem::all();
        $problem = $problems->count();
        $usermodel = UserModel::all()->count();
        if (auth('admin')->check()) {
            return response()->view('cms.dashboard.dashboard', [
                'users' => $users, 'spare_part' => $spare_part, 'brand' => $brand,
                'category' => $category, 'model' => $model, 'problem' => $problem,
                'usermodel' => $usermodel, 'technical' => $technical, 'agent' => $agent, 'customer' => $customer,
            ]);
        } else {

            if (auth('user')->user()->user_type == 'agent') {
                $repairs = Repair::latest()->where('agent_id',auth('user')->user()->id)->limit(10)->simplePaginate(5);;
                $problem=Problem::where( 'country_id' , auth('user')->user()->country_id)->count();
                $repair = Repair::latest()->where('agent_id',auth('user')->user()->id)->count();
                // $users=User::where('user_type','technical')->get();

                return response()->view('cms.dashboard.dashboard', [
                    'repairs' => $repairs , 'problem' => $problem,'repair' => $repair
                ]);
            } elseif (auth('user')->user()->user_type == 'technical') {
                $problem=Problem::all();
                $repairs = Repair::where('technecal_id', auth('user')->user()->id)->withCount('spareparts')->with('problem')->get();
                return response()->view('cms.dashboard.dashboard', ['problem' => $problem , 'repairs'=>$repairs]);
            } else {
                $id=auth('user')->user()->id;
                $user_models = UserModel::Where('user_id',$id)->get();
                return response()->view('cms.dashboard.dashboard', ['user_models' => $user_models]);
              
            }
        }
    }
}
