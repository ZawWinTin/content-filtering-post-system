<?php

namespace App\Repositories\Admin;

use Exception;
use Throwable;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportRepository
{
    public function getAll()
    {
        $reports = Report::with([
            'user',
            'post',
        ])
            ->latest()
            ->paginate(request('limit') ?: Report::count());

        return compact('reports');
    }

    public function update(Request $request)
    {
        $report = Report::findOrFail($request->id);
        try {
            DB::beginTransaction();

            $report->update([
                'is_checked' => true,
            ]);

            $report->post()->update([
                'is_harmful_content' => $request->is_harmful_content,
            ]);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            Log::error(__CLASS__ . '::' . __FUNCTION__ . '[line: ' . __LINE__ . ']Message: ' . $e->getMessage());

            throw new Exception('Report saved failed.');
        }
    }
}
