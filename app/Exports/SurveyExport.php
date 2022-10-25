<?php

namespace App\Exports;

use App\Models\SupplierSurvey;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SurveyExport implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function collection()
    {
        $request = $this->request;
        return SupplierSurvey::select('id','respondent_id','starting_ip','end_ip','status','created_at','updated_at')->where(['supplier_project_id' => $request->pid])->get();
    }
    public function headings(): array
    {
        return ["UID", "RESPONDENT ID", "STARTING IP",'END IP','STATUS','START AT','END AT'];
    }
}
