<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;
use App\Http\Requests\CsvImportRequest;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class DataController extends Controller
{
    public function index()
    {

        return view('import');
    }

    public function import_csv(CsvImportRequest $request)
    {
        $field_data = Data::all();
        $path = $request->file('csv_file')->getrealPath();

        $data = array_map('str_getcsv', file($path));
        if (count($data) > 0) {

            foreach ($data as $key => $dt) {
                if ($key > 0) {
                    $field_data1 = new Data();
                    $data = Data::where('name', '=', $dt[0])->first();
                    if ($data == null) {
                        $field_data1->name = $dt[0];
                        $field_data1->price = $dt[1];
                        $field_data1->bedrooms = $dt[2];
                        $field_data1->bathrooms = $dt[3];
                        $field_data1->storeys = $dt[4];
                        $field_data1->garages = $dt[5];
                        $field_data1->save();
                    }
                }
            }

//            $csv_data = $data;
//
//            $csv_data_file = CsvData::create([
//                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
//                'csv_data' => json_encode($data)
//            ]);
        } else {
            return redirect()->back();
        }
        return view('import_field', compact('field_data'));
    }

    public function search(Request $request)
    {
        $good_query = Data::query();

        if ($request->name) {
            $good_query->where('name', 'like', '%' . $request->get('name') . '%');
        }
        if ($request->price) {
            $good_query->where('price', 'like', '%' . $request->get('price') . '%');
        }
        if ($request->bedrooms != 'Select bedrooms') {
            $good_query->where('bedrooms', 'like', '%' . $request->get('bedrooms') . '%');
        }
        if ($request->bathrooms != 'Select bathrooms') {
            $good_query->where('bathrooms', 'like', '%' . $request->get('bathrooms') . '%');
        }
        if ($request->storeys != 'Select storeys') {
            $good_query->where('storeys', 'like', '%' . $request->get('storeys') . '%');
        }
        if ($request->garages != 'Select garages') {
            $good_query->where('garages', 'like', '%' . $request->get('garages') . '%');
        }
        $field_data = $good_query->get();

        return response()->json($field_data);
    }


}
