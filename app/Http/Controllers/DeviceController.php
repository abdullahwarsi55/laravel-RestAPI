<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function list()
    {
        return Device::all();
    }
    public function listparms($id)
    {
        return Device::find($id);
    }

 public function add(Request $request){
    $device = new Device;
    $device->name = $request->name;
    $device->price = $request->price;
    $device->model = $request->model;
    $device->specification = $request->specification;
    $device->save(); 
    return["Result"=>"Data has been saved"];
  }

  public function update(Request $request ,$id){
    $device = Device::find($id);
    $device->name = $request->name;
    $device->price = $request->price;
     $device->model = $request->model;
     $device->specification = $request->specification;
     $device->save(); 
     return["Result"=>"Data has been updated"];
  }

  public function search($name){
    return Device::where("name",$name)->get();
  }

  public function delete($id){
    Device::find($id)->delete();
    return["Result"=>"Data deleted successfully"];
  }

}
