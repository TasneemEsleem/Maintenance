<?php
   namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductModel;
use App\Models\SModel;
use App\Models\UserModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
   use Symfony\Component\HttpFoundation\Response;
   
 

class UserModelController extends Controller
{
        public function indexUserModels()
         {
            $id=auth('user')->user()->id;
            $user_models = UserModel::Where('user_id',$id)->get();
            return response()->view('cms.user_model.index', ['user_models' => $user_models]);
          }
        public function editUserModels()
        {
            $user = auth()->user();
            $userModels = $user->smodels;
            $models = SModel::where('active', 1)->get();
            foreach ($models as $model) {
                $model->setAttribute('granted', false);
                foreach ($userModels as $userModel) {
                    if ($userModel->id == $model->id) {
                        $model->setAttribute('granted', true);
                        break;
                    }
                }
            }
           $brands =Brand::all();
          $categories=Category::all();

           return response()->view('cms.user_model.create', ['models' => $models,'brands'=>$brands,'categories'=>$categories]);
        }
        public function updateUserModels(Request $request)
        {
            $validator = Validator($request->all(), [
                'model_id' => 'required|exists:s_models,id',
            ]);
            if (!$validator->fails()) {
                
                foreach ($request->input('model_id') as $model_id) {
                    $model=UserModel::Where('user_id',auth('user')->user()->id)->where('model_id',$model_id)->first();
                    if($model ==null){
                        $user_model = new UserModel();
                        $user_model->user_id = auth('user')->user()->id;
                        $user_model->model_id = $model_id;
                        $isSaved = $user_model->save();

                    }

                }
                return response()->json(
                    ['message' => 'Saved successfully' ],
                     Response::HTTP_CREATED 
                );
            } else {
                return response()->json(
                    ['message' => $validator->getMessageBag()->first()],
                    Response::HTTP_BAD_REQUEST,
                );
            } 
    
        }
        public function addModels($product_models_id)
        {
            $userequipment = new UserModel();
            $userequipment->user_id = auth('user')->user()->id;
            $userequipment->model_id = $product_models_id;
            $isSaved = $userequipment->save();
        }
        public function deleteModels($id)
        {
            $models = UserModel::where('id', $id)->first();
            $isDeleted = $models->delete();
        }
}
    

