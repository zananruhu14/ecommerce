<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CartonGap extends Component
{
    public $file_no = 220877;
    public $cust = 'K8UT5TA';
    public $search;
    public $stlye;
    public $idp;
    public $buyer;

    public function submit()
    {

        $this->cust = $this->search;

    }

    public function render()
    {
        // $results = DB::connection('erp')->select('exec sp_cal_carton_GU @SO = ?', array($this->file_no));
        $results = DB::connection('erp')->select("EXEC sp_cal_carton_pack 	@buyer = null,
		@bay = 1,
		@CustPO = '$this->cust',
		@idp = NULL,
		@P = NULL,
		@L = NULL,
		@T = NULL,
		@xBegin = NULL,
		@xEnd = NULL
");
        $items = collect($results);
        $grouped_items = $items->groupBy('xBoxCode')->map(function ($group) {
            return [
                'xBoxCode' => $group[0]->xBoxCode,
                'xLength' => $group[0]->xLength,
                'xWidth' => $group[0]->xWidth,
                'xHeight' => $group[0]->xHeight,
                'cnt' => collect($group)->sum('cnt'),
                'xPO' => collect($group)->unique('xPO')->pluck('xPO'),
                'xCustNo' => collect($group)->unique('xCustNo')->pluck('xCustNo'),
                'ItemCode ' => collect($group)->unique('ItemCode ')->pluck('ItemCode '),
                'xRegion' => collect($group)->unique('xRegion')->pluck('xRegion'),
                'shpt' => collect($group)->unique('shpt')->pluck('shpt'),
                'sNumber' => collect($group)->unique('sNumber')->pluck('sNumber'),
            ];
        });

        $gid = $items->pluck('xBoxCode')->unique();
        $packing = $items->pluck('sNumber')->unique();
        // $query = DB::connection('erp')->select('SELECT xCustNo AS po
        // FROM [MESDB].[dbo].[et_invo_packing]');

        // $head = collect($query);
        $this->style = $items->pluck('xStyleNo')->unique()[0];
        $this->idp = $items->pluck('xPO')->unique();
        $this->buyer = $items->pluck('xSymbol')->unique()[0];
        $total = $items->sum('cnt');
        $negara = $items->pluck('xRegion')->unique();

        $filter_buyer = $items->pluck('xSymbol')->unique();
        $filter_supplier = ["PURBAYASA PUTRAPERKA", "HARAPAN INDAH LESTAR"];

        $hasil = DB::connection('erp')->select("select top 1000 k.sID as sIndex, k.xFactBuyUnitQty as xtQty,k.xDefUnitFactQty as xxQty, k.xStockDoQty, a.sCode AS _Acce_Code, a.xKind AS _Acce_Kind, a.xName AS _Acce_Name, b.xSpec AS xSpec,
        b.xDesc AS xDesc, b.xColor, b.xSize, b.xOther, b.xPO, b.xStyleNo2 AS xStyleNo, a.xCIQKind AS _Acce_CIQ, b.xCustAcceryCode, b.xUse,
        cc.xSymbol AS _Cust_Symbol,  k.xFactBuyUnit as sUnit, c._Depot_code as xdepot, c._Depot_Name as xdepot_detail, v.xBuyNo AS xBuyNo, v.xBuyPrice as price,
        v.xBillInNo AS xNpb,
        d.xSymbol as supplier
        FROM rv_stocknew AS k WITH(NOLOCK) INNER JOIN rt_barcode AS b ON b.sID = k.rBC_ID
         INNER JOIN rv_accessory AS a ON a.sID = b.rAcce_ID
         INNER JOIN rv_place AS c ON c.sID = k.rPlace_ID  LEFT JOIN zt_customer AS cc ON b.rCust_ID = cc.sID
        LEFT JOIN rv_src AS v ON k.rBill_Type=v.rBill_Type AND k.rBill_mID=v.rBill_mID AND k.rBill_dID=v.rBill_dID
        LEFT JOIN zt_customer AS d ON b.rSupp_ID = d.sID
        where k.xDefUnitFactQty > 0 and a.sCode IN ('CB-0005', 'CB-0007', 'CB-0008' , 'CB-0009', 'CB-0010', 'CB-0011', 'CB-0012')
        ");

        $cek = collect(json_decode(json_encode($hasil), true))->whereIn('_Cust_Symbol', $filter_buyer)->whereNotIn('supplier', 'HARAPAN INDAH LESTARI')->map(function ($item) {
            if (strpos($item['xSpec'], 'CM') !== false) {
                $spec = explode('X', trim($item['xSpec']));
                if (count($spec) == 3) {
                    $item['xLength'] = str_replace('CM', '', trim($spec[0]));
                    $item['xWidth'] = str_replace('CM', '', trim($spec[1]));
                    $item['xHeight'] = str_replace('CM', '', trim($spec[2]));
                }
            } elseif (strpos($item['xSpec'], 'MM') !== false) {
                $xSpec = explode(':', $item['xSpec']);
                if (count($xSpec) == 2) {
                    $spec = explode('X', trim($xSpec[1]));
                    if (count($spec) == 3) {
                        $item['xLength'] = str_replace('MM', '', trim($spec[0])) / 10;
                        $item['xWidth'] = str_replace('MM', '', trim($spec[1])) / 10;
                        $item['xHeight'] = str_replace('MM', '', trim($spec[2])) / 10;
                    }
                }
            } else {
                $item['xLength'] = 30;
                $item['xWidth'] = 30;
                $item['xHeight'] = 30;
            }
            return $item;
        });
        $grouped_stock = collect(json_decode(json_encode($hasil), true))->where('_Cust_Symbol', "GAP")->whereNotIn('supplier', 'HARAPAN INDAH LESTARI')->groupBy('xSpec')->map(function ($stock) {
            return [
                'size' => $stock[0]['xSpec'],
                'total' => collect($stock)->sum('xtQty'),
                'xPO' => collect($stock)->unique('xPO')->pluck('xPO'),
                'xBuyNo' => collect($stock)->unique('xBuyNo')->pluck('xBuyNo'),
            ];
        });

        // $value = $stock->pluck('xSpec');

        return view('livewire.carton-gap', compact('items', 'gid', 'grouped_items', 'total', 'cek', 'grouped_stock'))->extends('layout.dashboard')->section('container');

    }
}
