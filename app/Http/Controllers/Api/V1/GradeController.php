<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Grade;
use App\Http\Requests\GradeStoreRequest;
use App\Http\Requests\GradeUpdateRequest;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Http\Resources\Finance\GradeResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::paginate(20);
        return GradeResource::collection($grades);
    }

    public function store(StoreGradeRequest $request)
    {
        $grade = Grade::create($request->validated());
        return new GradeResource($grade);
    }

    public function show(Grade $grade)
    {
        return new GradeResource($grade);
    }

    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $grade->update($request->validated());
        return new GradeResource($grade);
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return response()->noContent();
    }
}
