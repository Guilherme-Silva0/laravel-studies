<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();

        // gráfico 1 - usuários

        $usersData = User::select([
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*) as total'),
        ])
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->get();

        foreach($usersData as $data) {
            $year[] = $data->year;
            $total[] = $data->total;
        }

        $userLabel = "'Comparativos de cadastros de usuários'";
        $userYear = json_encode($year);
        $userTotal = json_encode($total);

        // gráfico 2 - Categorias

        $categoriesData = Category::all();
        
        foreach($categoriesData as $data) {
            $categoryName[] = $data->name;
            $categoryTotal[] = Product::where('category_id', $data->id)->count();
        }

        $categoryLabel = json_encode($categoryName);
        $categoryTotal = json_encode($categoryTotal);

        return view(
            'admin.dashboard',
            compact('usersCount', 'userLabel', 'userYear', 'userTotal', 'categoryLabel', 'categoryTotal')
        );
    }
}
