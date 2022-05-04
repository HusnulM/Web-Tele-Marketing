@extends('templates/main')

@section('title', 'Input Data')

@section('header-content')

@endsection

@section('content')
<form action="{{ url('/save-data') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Input Data</h3>
                    <div class="card-tools">                        
                        
                        <button type="submit" class="btn btn-primary btn-sm"> 
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            @if(count($errors) > 0)
                                @foreach( $errors->all() as $message )
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close closeAlert" data-dismiss="alert"></button> 
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endforeach            
                            @endif
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block msgAlert">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="alert alert-danger msgAlert">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="noHp">Nomor HP / Telephone</label>
                                    <input type="text" name="noHp" class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            @if(Auth::user()->typeuser === 'CS')
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline" style="margin-right:25px;">
                                        <input type="checkbox" name="cbTelpStatus" id="cbTelpStatus">
                                        <label for="cbTelpStatus">Sudah di Telephone
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 tgltelp" style="display:none;">
                                <div class="form-group">
                                    <label for="tgltelp">Tanggal Telephone</label>
                                    <input type="date" name="tgltelp" id="tgltelp" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <select name="comment" id="comment" class="form-control" required>
                                        <option value="Good">Good</option>
                                        <option value="Bad">Bad</option>
                                        <option value="Outstanding">Outstanding</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
    </div>    
</form>
@endsection

@section('additional-js')
<script>
    $(function(){
        // $('#kodebank').on('change', function(){
        //     var namaBank = document.getElementById("kodebank").options[document.getElementById("kodebank").selectedIndex].text;
        //     const myArray = namaBank.split("-");
        //     console.log(myArray[1]);
        //     $('#namabank').val(myArray[1]);
        // })
        var _telpStatus =     'N';
        $('#cbTelpStatus').on('change', function(){
            if(_telpStatus === 'N'){
                _telpStatus = 'Y';
                $('.tgltelp').show();
                document.getElementById("tgltelp").required = true;
            }else{
                _telpStatus = 'N';
                $('.tgltelp').hide();
                document.getElementById("tgltelp").required = false;
            }
                // alert(_ppnchecked)
            // if(_telpStatus === 'Y'){
            //     $('.tgltelp').show();
            // }else{
            //     $('.tgltelp').hide();
            // }
        });
    });
</script>
@endsection