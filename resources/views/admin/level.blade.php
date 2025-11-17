@extends('admin.layout.main') 
@section('container')
<div class="page-content">
    
    <style>
        tr.submit-tr {
    display: flex;
    align-items: center;
    column-gap: 12px;
}
tr.submit-tr td {
    display: flex;
    align-items: center;
    column-gap: 12px;
    margin-bottom: 21px;
}
td.manu-list {
    width: 43%;
}
button.save-btn {
    border: none;
    padding: 7px 26px;
    font-size: 16px;
}
input.bonus-input {
  padding: 5px 26px;
    font-size: 16px;
}
input.cashback {
    padding: 6.9px  10px;
}
.cash_area {
    padding-left: 21px;
}
    </style>

                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Level Setting</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                            <li class="breadcrumb-item active">Level Setting</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Level Setting</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('store.level') }}" method="POST">
                                            @csrf
                                            <table>
                                                @foreach(range(1, 6) as $levelNumber)
                                                    @php
                                                        // Find the level by its name (e.g., "Level 1", "Level 2")
                                                        $level = \App\Models\LevelBonus::where('level', 'Level ' . $levelNumber)->first();
                                                     
                                                    @endphp
                                                    <tr class="submit-tr">
                                                        <td class="manu-list">{{ 'Level ' . $levelNumber }}</td>
                                                        <td>
                                                            <input type="text" name="bonuses[{{ $levelNumber }}]" class="bonus-input" 
                                                                   value="{{ $level ? $level->bonus : 0 }}">
                                                            <input type="hidden" name="level [{{ $levelNumber }}]" value="{{ 'Level ' . $levelNumber }}">
                                                            <button type="submit" class="save-btn">Save</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            <br>
                                            <div class="cash_area">
                                                <table>
                                                    <tr>
                                                        <td>Cashback(%)</td>
                                                        <td>
                                                            <input type="text" name="cashback" class="cashback" value="@if($cashback != null) {{ $cashback->cashback }} @endif">
                                                            
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td>Service Tax(%)</td>
                                                        <td>
                                                            <input type="text" name="service_tx" class="cashback" value="@if($cashback != null) {{ $cashback->service_tx }} @endif">
                                                         
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td>TDS(%)</td>
                                                        <td>
                                                            <input type="text" name="tds" class="cashback" value="@if($cashback != null) {{ $cashback->tds }} @endif">
                                                            <button type="submit" class="save-btn">Save</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div> 
                </div>
@endsection