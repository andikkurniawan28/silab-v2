<?php

namespace App\Http\Controllers;

use App\Models\Taxation;
use App\Models\Log;
use Illuminate\Http\Request;

class TaxationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxations = Taxation::latest()->paginate(8);
        $stations = $this->serveStation();
        $labels = self::prepareLabel();
        $vars = self::prepareVars();

        for($i = 0; $i < count($labels); $i++)
            $colors[$i] = self::determineColor($i);

        return view('taxation.index', compact('taxations', 'stations', 'labels', 'vars', 'colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taxations = Taxation::latest()->paginate(1000);
        $stations = $this->serveStation();
        return view('taxation.all_data', compact('taxations', 'stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add([
            'admin' => Auth()->user()->name,
        ]);
        Taxation::create($request->all());
        Log::writeLog('Taksasi', 'Create New Taksasi', Auth()->user()->name);
        return redirect()->back()->with('success', 'Taksasi In Proses berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taxation  $taxation
     * @return \Illuminate\Http\Response
     */
    public function show(Taxation $taxation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taxation  $taxation
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxation $taxation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taxation  $taxation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Taxation::where('id', $id)->update([
            'peti_nira_mentah' => $request->peti_nira_mentah,
            'pemanas_nira_mentah' => $request->pemanas_nira_mentah,
            'reaction_tank' => $request->reaction_tank,
            'defekator' => $request->defekator,
            'clarifier_st' => $request->clarifier_st,
            'pemanas_nira_encer' => $request->pemanas_nira_encer,
            'evap1' => $request->evap1,
            'evap2' => $request->evap2,
            'evap3' => $request->evap3,
            'evap4' => $request->evap4,
            'evap5' => $request->evap5,
            'evap6' => $request->evap6,
            'evap7' => $request->evap7,
            'evap8' => $request->evap8,
            'evap9' => $request->evap9,
            'nk_sebelum_sulfitasi' => $request->nk_sebelum_sulfitasi,
            'nk_sulfitasi_atas' => $request->nk_sulfitasi_atas,
            'nk_sulfitasi_bawah' => $request->nk_sulfitasi_bawah,
            'klare_shs_atas' => $request->klare_shs_atas,
            'klare_shs_bawah' => $request->klare_shs_bawah,
            'pan1' => $request->pan1,
            'pan2' => $request->pan2,
            'pan3' => $request->pan3,
            'pan4' => $request->pan4,
            'pan5' => $request->pan5,
            'pan6' => $request->pan6,
            'pan7' => $request->pan7,
            'pan8' => $request->pan8,
            'pan9' => $request->pan9,
            'pan10' => $request->pan10,
            'pan11' => $request->pan11,
            'pan12' => $request->pan12,
            'pan13' => $request->pan13,
            'pan14' => $request->pan14,
            'palung1' => $request->palung1,
            'palung2' => $request->palung2,
            'palung3' => $request->palung3,
            'palung4' => $request->palung4,
            'palung5' => $request->palung5,
            'palung6' => $request->palung6,
            'palung7' => $request->palung7,
            'palung8' => $request->palung8,
            'palung9' => $request->palung9,
            'palung10' => $request->palung10,
            'dist_mixer_a_utara' => $request->dist_mixer_a_utara,
            'dist_mixer_a_selatan' => $request->dist_mixer_a_selatan,
            'cvp_c' => $request->cvp_c,
            'palung_cvp_c' => $request->palung_cvp_c,
            'dist_mixer_c_timur' => $request->dist_mixer_c_timur,
            'dist_mixer_c_barat' => $request->dist_mixer_c_barat,
            'cvp_d' => $request->cvp_d,
            'palung_cvp_d' => $request->palung_cvp_d,
            'vertical_timur' => $request->vertical_timur,
            'vertical_barat' => $request->vertical_barat,
            'dist_mixer_d1' => $request->dist_mixer_d1,
            'dist_mixer_d2' => $request->dist_mixer_d2,
            'stroop_a_atas' => $request->stroop_a_atas,
            'stroop_a_bawah' => $request->stroop_a_bawah,
            'stroop_c_atas' => $request->stroop_c_atas,
            'stroop_c_bawah' => $request->stroop_c_bawah,
            'klare_d_atas' => $request->klare_d_atas,
            'klare_d_bawah' => $request->klare_d_bawah,
            'einwuurf_c' => $request->einwuurf_c,
            'einwuurf_d' => $request->einwuurf_d,
            'clear_liquor_1' => $request->clear_liquor_1,
            'clear_liquor_2' => $request->clear_liquor_2,
            'remelt_a' => $request->remelt_a,
            'r1_mol_atas' => $request->r1_mol_atas,
            'r2_mol_atas' => $request->r2_mol_atas,
            'r1_mol_bawah' => $request->r1_mol_bawah,
            'r2_mol_bawah' => $request->r2_mol_bawah,
            'remelter_a1' => $request->remelter_a1,
            'remelter_a2' => $request->remelter_a2,
            'remelter_cd' => $request->remelter_cd,
            'mingler_atas' => $request->mingler_atas,
            'mingler_bawah' => $request->mingler_bawah,
            'silo_retail' => $request->silo_retail,
            'shs_silo' => $request->shs_silo,
            'pp' => $request->pp,
            'reaction_tank_drk' => $request->reaction_tank_drk,
            'talo_phospatasi' => $request->talo_phospatasi,
            'deep_bad_filter' => $request->deep_bad_filter,
            'co2_gas_carbonator1' => $request->co2_gas_carbonator1,
            'co2_gas_carbonator2' => $request->co2_gas_carbonator2,
            'first_filtrat_tank' => $request->first_filtrat_tank,
            'sweet_water_tank' => $request->sweet_water_tank,
            'clear_liquor_tank1' => $request->clear_liquor_tank1,
            'clear_liquor_tank2' => $request->clear_liquor_tank2,
            'carbonated_liquor_tank1' => $request->carbonated_liquor_tank1,
            'carbonated_liquor_tank2' => $request->carbonated_liquor_tank2,
            'raw_liquor_tank1' => $request->raw_liquor_tank1,
            'raw_liquor_tank2' => $request->raw_liquor_tank2,
            'clarifier_melt_tank1' => $request->clarifier_melt_tank1,
            'clarifier_melt_tank2' => $request->clarifier_melt_tank2,
            'filtered_melt_tank1' => $request->filtered_melt_tank1,
            'filtered_melt_tank2' => $request->filtered_melt_tank2,
            'back_wash_tank1' => $request->back_wash_tank1,
            'back_wash_tank2' => $request->back_wash_tank2,
        ]);
        Log::writeLog('Taksasi', 'Edit Taksasi', Auth()->user()->name);
        return redirect()->back()->with('success', 'Taksasi In Proses berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taxation  $taxation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Taxation::find($id)->delete();
        Log::writeLog('Taksasi', 'Delete Taksasi', Auth()->user()->name);
        return redirect()->back()->with('success', 'Taksasi In Proses berhasil dihapus');
    }

    public function prepareVars()
    {
        return $vars = [
            'peti_nira_mentah',
            'pemanas_nira_mentah',
            'reaction_tank',
            'defekator',
            'clarifier_st',
            'pemanas_nira_encer',
            'evap1',
            'evap2',
            'evap3',
            'evap4',
            'evap5',
            'evap6',
            'evap7',
            'evap8',
            'evap9',
            'nk_sebelum_sulfitasi',
            'nk_sulfitasi_atas',
            'nk_sulfitasi_bawah',
            'klare_shs_atas',
            'klare_shs_bawah',
            'pan1',
            'pan2',
            'pan3',
            'pan4',
            'pan5',
            'pan6',
            'pan7',
            'pan8',
            'pan9',
            'pan10',
            'pan11',
            'pan12',
            'pan13',
            'pan14',
            'palung1',
            'palung2',
            'palung3',
            'palung4',
            'palung5',
            'palung6',
            'palung7',
            'palung8',
            'palung9',
            'palung10',
            'dist_mixer_a_utara',
            'dist_mixer_a_selatan',
            'cvp_c',
            'palung_cvp_c',
            'dist_mixer_c_timur',
            'dist_mixer_c_barat',
            'cvp_d',
            'palung_cvp_d',
            'vertical_timur',
            'vertical_barat',
            'dist_mixer_d1',
            'dist_mixer_d2',
            'stroop_a_atas',
            'stroop_a_bawah',
            'stroop_c_atas',
            'stroop_c_bawah',
            'klare_d_atas',
            'klare_d_bawah',
            'einwuurf_c',
            'einwuurf_d',
            'clear_liquor_1',
            'clear_liquor_2',
            'remelt_a',
            'r1_mol_atas',
            'r2_mol_atas',
            'r1_mol_bawah',
            'r2_mol_bawah',
            'remelter_a1',
            'remelter_a2',
            'remelter_cd',
            'mingler_atas',
            'mingler_bawah',
            'silo_retail',
            'shs_silo',
            'pp',
            'reaction_tank_drk',
            'talo_phospatasi',
            'deep_bad_filter',
            'co2_gas_carbonator1',
            'co2_gas_carbonator2',
            'first_filtrat_tank',
            'sweet_water_tank',
            'clear_liquor_tank1',
            'clear_liquor_tank2',
            'carbonated_liquor_tank1',
            'carbonated_liquor_tank2',
            'raw_liquor_tank1',
            'raw_liquor_tank2',
            'clarifier_melt_tank1',
            'clarifier_melt_tank2',
            'filtered_melt_tank1',
            'filtered_melt_tank2',
            'back_wash_tank1',
            'back_wash_tank2',
        ];
    }

    public function prepareLabel()
    {
        return $labels = [
            'peti nira mentah',
            'pemanas nira mentah',
            'reaction tank',
            'defekator',
            'clarifier st',
            'pemanas nira encer',
            'evap1',
            'evap2',
            'evap3',
            'evap4',
            'evap5',
            'evap6',
            'evap7',
            'evap8',
            'evap9',
            'nk sebelum sulfitasi',
            'nk sulfitasi atas',
            'nk sulfitasi bawah',
            'klare shs atas',
            'klare shs bawah',
            'pan1',
            'pan2',
            'pan3',
            'pan4',
            'pan5',
            'pan6',
            'pan7',
            'pan8',
            'pan9',
            'pan10',
            'pan11',
            'pan12',
            'pan13',
            'pan14',
            'palung1',
            'palung2',
            'palung3',
            'palung4',
            'palung5',
            'palung6',
            'palung7',
            'palung8',
            'palung9',
            'palung10',
            'dist mixer a utara',
            'dist mixer a selatan',
            'cvp c',
            'palung cvp c',
            'dist mixer c timur',
            'dist mixer c barat',
            'cvp d',
            'palung cvp d',
            'vertical timur',
            'vertical barat',
            'dist mixer d1',
            'dist mixer d2',
            'stroop a atas',
            'stroop a bawah',
            'stroop c atas',
            'stroop c bawah',
            'klare d atas',
            'klare d bawah',
            'einwuurf c',
            'einwuurf d',
            'clear liquor 1',
            'clear liquor 2',
            'remelt a',
            'r1 mol atas',
            'r2 mol atas',
            'r1 mol bawah',
            'r2 mol bawah',
            'remelter a1',
            'remelter a2',
            'remelter cd',
            'mingler atas',
            'mingler bawah',
            'silo retail',
            'shs silo',
            'pp',
            'reaction tank drk',
            'talo phospatasi',
            'deep bad filter',
            'co2 gas carbonator1',
            'co2 gas carbonator2',
            'first filtrat tank',
            'sweet water tank',
            'clear liquor tank1',
            'clear liquor tank2',
            'carbonated liquor tank1',
            'carbonated liquor tank2',
            'raw liquor tank1',
            'raw liquor tank2',
            'clarifier melt tank1',
            'clarifier melt tank2',
            'filtered melt tank1',
            'filtered melt tank2',
            'back wash tank1',
            'back wash tank2',
        ];
    }

    public function determineColor($someValue)
    {
        switch($someValue % 6)
        {
            case 0 : return 'primary'; break;
            case 1 : return 'secondary'; break;
            case 2 : return 'success'; break;
            case 3 : return 'danger'; break;
            case 4 : return 'info'; break;
            case 5 : return 'dark'; break;
        }
    }

    public function export(Request $request)
    {
        $vars = [
            'peti_nira_mentah',
            'pemanas_nira_mentah',
            'reaction_tank',
            'defekator',
            'clarifier_st',
            'pemanas_nira_encer',
            'evap1',
            'evap2',
            'evap3',
            'evap4',
            'evap5',
            'evap6',
            'evap7',
            'evap8',
            'evap9',
            'nk_sebelum_sulfitasi',
            'nk_sulfitasi_atas',
            'nk_sulfitasi_bawah',
            'klare_shs_atas',
            'klare_shs_bawah',
            'pan1',
            'pan2',
            'pan3',
            'pan4',
            'pan5',
            'pan6',
            'pan7',
            'pan8',
            'pan9',
            'pan10',
            'pan11',
            'pan12',
            'pan13',
            'pan14',
            'palung1',
            'palung2',
            'palung3',
            'palung4',
            'palung5',
            'palung6',
            'palung7',
            'palung8',
            'palung9',
            'palung10',
            'dist_mixer_a_utara',
            'dist_mixer_a_selatan',
            'cvp_c',
            'palung_cvp_c',
            'dist_mixer_c_timur',
            'dist_mixer_c_barat',
            'cvp_d',
            'palung_cvp_d',
            'vertical_timur',
            'vertical_barat',
            'dist_mixer_d1',
            'dist_mixer_d2',
            'stroop_a_atas',
            'stroop_a_bawah',
            'stroop_c_atas',
            'stroop_c_bawah',
            'klare_d_atas',
            'klare_d_bawah',
            'einwuurf_c',
            'einwuurf_d',
            'clear_liquor_1',
            'clear_liquor_2',
            'remelt_a',
            'r1_mol_atas',
            'r2_mol_atas',
            'r1_mol_bawah',
            'r2_mol_bawah',
            'remelter_a1',
            'remelter_a2',
            'remelter_cd',
            'mingler_atas',
            'mingler_bawah',
            'silo_retail',
            'shs_silo',
            'pp',
            'reaction_tank_drk',
            'talo_phospatasi',
            'deep_bad_filter',
            'co2_gas_carbonator1',
            'co2_gas_carbonator2',
            'first_filtrat_tank',
            'sweet_water_tank',
            'clear_liquor_tank1',
            'clear_liquor_tank2',
            'carbonated_liquor_tank1',
            'carbonated_liquor_tank2',
            'raw_liquor_tank1',
            'raw_liquor_tank2',
            'clarifier_melt_tank1',
            'clarifier_melt_tank2',
            'filtered_melt_tank1',
            'filtered_melt_tank2',
            'back_wash_tank1',
            'back_wash_tank2',
            'admin',
        ];
        return view('taxation.export', compact('request', 'vars'));
    }
}
