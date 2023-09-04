<?php

namespace App\Http\Controllers;

use App\Models\TCandidate;
use Illuminate\Http\Request;

class TCandidateController extends Controller
{
    public function index(Request $request)
    {
        // Return a list of candidates
        try{
            
            if($request->get('search') != null){
                $candidates = TCandidate::where('full_name', 'LIKE', '%' . $request->get('search') . '%')
                                        ->orWhere('dob', 'LIKE', '%' . $request->get('search') . '%')
                                        ->orWhere('pob', 'LIKE', '%' . $request->get('search') . '%')
                                        ->orWhere('gender', 'LIKE', '%' . $request->get('search') . '%')
                                        ->orWhere('last_salary', 'LIKE', '%' . $request->get('search') . '%')
                                        ->orWhere('year_exp', 'LIKE', '%' . $request->get('search') . '%')
                                        ->paginate(10);
                return response()->json($candidates, 200);    
            }else{
                $candidates = TCandidate::paginate(10);
                return response()->json($candidates, 200);
            }

        }catch(\Exception $e){
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try{
            $candidate = TCandidate::find($id);
            if (!$candidate) {
                return response()->json(['message' => 'Candidate not found'], 404);
            }
            return response()->json($candidate, 200);
        }catch(\Exception $e){
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try{
            $data = $request->validate([
                'email' => 'required|unique:t_candidate,email',
                'full_name' => 'required',
                'dob' => 'required',
                'pob' => 'required',
                'gender' => 'required',
                'year_exp' => 'required',
                'last_salary' => 'nullable',
            ]);

            $candidate = TCandidate::create($data);
            return response()->json($candidate, 201);
        }catch(\Exception $e){
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $candidateId)
    {
        // Update an existing candidate
        try{

            $candidate = TCandidate::find($candidateId);

            if (!$candidate) {
                return response()->json(['message' => 'Candidate not found'], 404);
            }

            $data = $request->validate([
                'email' => 'required',
                'full_name' => 'required',
                'dob' => 'required',
                'pob' => 'required',
                'gender' => 'required',
                'year_exp' => 'required',
                'last_salary' => 'nullable',
            ]);


            $candidate->update($data);
            return response()->json($candidate);

        } catch(\Exception $e) {
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        // Delete a candidate
        try{
            $candidate = TCandidate::find($id);
            if (!$candidate) {
                return response()->json(['message' => 'Candidate not found'], 404);
            }

            $candidate->delete();
            return response()->json(['message' => 'Candidate deleted'], 200);
        } catch(\Exception $e) {
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage()], 500);
        }
    }
}
