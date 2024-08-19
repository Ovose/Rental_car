<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TableController extends Controller
{
    // Отображение списка таблиц
    public function list()
    {
        $allowedTables = ['rentals', 'cars', 'users', 'drivers'];

        
        $tables = DB::select('SHOW TABLES');

        
        $tables = array_map(function ($table) {
            return (array_values((array)$table))[0];
        }, $tables);

        // Фильтр
        $filteredTables = array_filter($tables, function ($table) use ($allowedTables) {
            return in_array($table, $allowedTables);
        });

        return view('tables', ['tables' => $filteredTables]);
    }

    // Отображение данных таблицы
    public function data($table)
    {
        $allowedTables = ['rentals', 'cars', 'users', 'drivers'];

        if (!in_array($table, $allowedTables)) {
            abort(404);
        }

        
        $columns = Schema::getColumnListing($table);
        $rows = DB::table($table)->get();

        return view('table_data', [
            'table' => $table,
            'columns' => $columns,
            'rows' => $rows
        ]);
    }

    // Форма добавления новых данных
    public function create($table)
    {
        $allowedTables = ['rentals', 'cars', 'users', 'drivers'];

        if (!in_array($table, $allowedTables)) {
            abort(404);
        }

        $columns = Schema::getColumnListing($table);

        
        $relatedData = $this->getRelatedData();

        return view('create_row', [
            'table' => $table,
            'columns' => $columns,
            'relatedData' => $relatedData
        ]);
    }

    // Сохранение новых данных
    public function store(Request $request, $table)
    {
        $allowedTables = ['rentals', 'cars', 'users', 'drivers'];

        if (!in_array($table, $allowedTables)) {
            abort(404);
        }

        
        $columns = Schema::getColumnListing($table);

       
        $data = array_intersect_key($request->all(), array_flip($columns));

        DB::table($table)->insert($data);

        return redirect()->route('table_data', ['table' => $table]);
    }

    // Форма редактирования данных
    public function edit($table, $id)
    {
        $allowedTables = ['rentals', 'cars', 'users', 'drivers'];

        if (!in_array($table, $allowedTables)) {
            abort(404);
        }

       
        $columns = Schema::getColumnListing($table);

        
        $row = DB::table($table)->find($id);

        
        $relatedData = $this->getRelatedData();

        return view('edit_row', [
            'table' => $table,
            'columns' => $columns,
            'row' => $row,
            'relatedData' => $relatedData
        ]);
    }

    // Сохранение измененных данных
    public function update(Request $request, $table, $id)
    {
        $allowedTables = ['rentals', 'cars', 'users', 'drivers'];

        if (!in_array($table, $allowedTables)) {
            abort(404);
        }

        
        $columns = Schema::getColumnListing($table);

        
        $data = array_intersect_key($request->all(), array_flip($columns));

        DB::table($table)->where('id', $id)->update($data);

        return redirect()->route('table_data', ['table' => $table]);
    }

    // Удаление данных
    public function destroy($table, $id)
    {
        $allowedTables = ['rentals', 'cars', 'users', 'drivers'];

        if (!in_array($table, $allowedTables)) {
            abort(404);
        }

        DB::table($table)->where('id', $id)->delete();

        return redirect()->route('table_data', ['table' => $table]);
    }

    // Получение данных для выпадающих списков
    private function getRelatedData()
    {
        return [
            'cars' => DB::table('cars')->pluck('model', 'id')->toArray(), 
            'users' => DB::table('users')->pluck('name', 'id')->toArray(),
            'drivers' => DB::table('drivers')->pluck('license_number', 'id')->toArray() 
        ];
    }
}
