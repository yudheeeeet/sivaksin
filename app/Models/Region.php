<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Region extends Model
{
    use HasFactory;

    protected $table = 'regions';
    protected $fillable = ['nama_desa', 'jumlah_sasaran', 'geojson'];

    public function posko()
    {
        return $this->hasMany(Posko::class);
    }

    public static function sebaran(){
        $tb="regions";
		$fq=DB::raw("nama_desa as nm, geojson, jumlah_sasaran AS aek, 0 as x1x2, 0 as powx1x2, 0 as s, 0 as z, '' as krit ");
		//init view
		$retVal="";
		$renderZ=DB::table("$tb")->select($fq)->get();
		$jum = 0;
		$rata = 0;
		$banyak = $renderZ->count();
		foreach($renderZ as $row)
		{
			$jum += $row->aek;
		}

		$rata = $jum / $banyak ;
		$jumx1x2 = 0;

		foreach($renderZ as $row)
		{
			$row->x1x2 = $row->aek - $rata;
			$row->powx1x2 = pow($row->x1x2,2);
			$jumx1x2 += $row->powx1x2;
		}

		$s = sqrt($jumx1x2 / $banyak);
		$z = null;
		foreach($renderZ as $row)
		{
			$row->s = $s;
			$row->z = ($row->aek - $rata) / $row->s;
            $z[] = $row->z;
		}

		$zTemp=null;
		for($i=0;$i<count($z);$i++)
			if($z[$i]>0)
				$zTemp[] = $z[$i];


		$maxZ = max($zTemp);
		$minZ = min($zTemp);

		$intv = ($maxZ - $minZ) / 3;
		

		$rg3 = $maxZ;
		$rg2 = $maxZ - $intv;
		$rg1 = $rg2 - $intv;


		foreach($renderZ as $row)
		{
			if($row->z < 0 )
				$row->krit = 3;
			else
			if($row->z <= $rg2)
				$row->krit = 2;
			else	
				$row->krit = 1;
			
		}

		$sebaran= [];
		foreach($renderZ as $row)
		{
            $sebaran[] = ['desa' => $row->nm, 'kategori' => $row->krit, 'jumlah' => $row->aek, 'geojson' => $row->geojson];
			
		}
        return $sebaran;
    }

}
