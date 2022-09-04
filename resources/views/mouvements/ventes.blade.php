@extends('layouts.app')
@section('title', 'effectuerMouvements')
@section('module')
    GESTION DES MOUVEMENTS
@endsection
@section('description')
    Module de Gestion des mouvements
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>EFFECTUEZ UNE VENTE</strong>
        </div>
        <div class="card-body">
            {!! Form::open(array('route' => 'ventes-save','method'=>'POST')) !!}
            <div class="row row-sm">
                <div class="form-group col-6">
                    <label>BENEFICIAIRE</label>
                    {!! Form::text('mouvements[benificiaire]', null, array('placeholder' => 'CLIENT','class' => 'form-control')) !!}
                </div>
                <div class="form-group col-6">
                    <label>REFERENCE</label>
                    {!! Form::text('mouvements[reference]', null, array('placeholder' => 'AUTOMATIQUE','class' => 'form-control','readonly')) !!}
                </div>
                <div class="form-group col-6">
                    <label>DATE MOUVEMENT</label>
                    {!! Form::date('mouvements[datemouvement]', \Carbon\Carbon::now(), array('placeholder' => 'DATE MOUVEMENT','class' => 'form-control')) !!}
                </div>


                <div class="form-group col-6">
                    <input type="hidden" class="form-control"  name="mouvements[type_id]" required value="2">
                </div>
            </div>
            <hr>
            <div>
                <table class="table table-theme table-rows v-middle" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                        <th class="text-center">DESIGNATION</th>
                        <th class="text-center"> QUANTITE </th>
                        <th class="text-center"> PRIX </th>
                        <th class="text-center">UNITE</th>
                        <th class="text-center">MONTANT</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="row clearfix">
                <div class="col-md-8">
                    <button id="addmore" class="btn btn-primary pull-left" type="button"><i data-feather='plus'></i>Ligne</button>
                    <button id='delete_row' class="pull-right btn btn-danger delete" type="button"><i data-feather='trash'></i>Ligne</button>
                </div>
                <div class="pull-left col-md-4">
                    <table class="table table-bordered table-hover" id="tab_logic_total">
                      <tbody>
                        <tr>
                            <th class="text-center">MONTANT</th>
                            <td class="text-center"><input type="text" name='mouvements[montant]' placeholder='0.00' class="form-control" id="sub_total" step="0.00" readonly/></td>
                          </tr>
                        <tr>
                            <th class="text-center">REDUCTION:</th>
                            <td class="text-center"><input type="text" name='mouvements[reduction]' id='connexes' class="form-control" id="connexes" step="0.00"/></td>
                          </tr>
                        <tr>
                        <tr>
                            <th class="text-center">GRAND TOTAL</th>
                            <td class="text-center"><input type="text" name='mouvements[total]' placeholder='0.00' class="form-control" id="total_amount" step="0.00" readonly/></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div  class="row py-3">
                <div class="form-group col-6">
                     <input type="hidden" class="form-control"  name="mouvements[user_id]" required value="{{ auth()->user()->id }}">
                </div>
                <div class="form-group col-6">
                    <input class="btn btn-primary" type="submit" value="Enregistrez"/>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/custom.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('libs/jquery/dist/jquery.min.js') }}" ></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">

        var i= $('#tab_logic tr').length;
        $("#addmore").on('click',function(){
            html = '<tr>';
            html += '<td>'+i+'</td>';
            html += '<td><input class="itemRow" type="checkbox"></td>';

            html += '<td><select class="form-control" name="article_id[]" id="article_'+i+'">@foreach($articles=App\Article::orderBy("designation","ASC")->get() as $article)<option value="{{ $article->id }}">{{ $article->designation }}| {{ $article->prix }} FC</option>@endforeach</select></td>';

            html += '<td><input type="number" name="quantite[]" id="qty_'+i+'" class="form-control qty"/></td>';
            html += '<td><input type="text" name="prix[]" id="prix_'+i+'" class="form-control price"/></td>';
            html += '<td><input type="text" name="unite[]" id="unite_'+i+'" class="form-control unite"/></td>';
            html += '<td><input type="text" name="total[]" placeholder="0.00" id="total_'+i+'" class="form-control total" step="0.00" readonly/></td>';
            html += '</tr>';
            $('#tab_logic').append(html);
            loadbyId(i);
            i++;

        });
        $(document).on('click','#checkAll', function()
        {
            $(".itemRow").prop("checked",this.checked);
        });

        $(document).on('click', '.itemRow',function(){
            if($('.itemRow:checked').length == $('.itemRow').length)
            {
                $('#checkAll').prop('checked',true);
            }
            else
            {
                $('#checkAll').prop('checked',false);
            }
        });

        $(document).ready(function()
        {
            var i=1;
            $('#qty').val('1');
            $('#connexes').val('0');

            $(".delete").on('click', function()
            {
	            $('.itemRow:checkbox:checked').parents("tr").remove();
	            $('#checkAlll').prop("checked", false);
                calculateTotal();
            });


            $('#tab_logic tbody').on('keyup change',function(){
                calc();

            });

            $('#connexes').on('keyup change',function(){
                calc_total();
            });

        });


        function calc()
        {
            $('#tab_logic tbody tr').each(function(i, element) {
                var html = $(this).html();
                if(html!='')
                {
                    var qty = $(this).find('.qty').val();
                    var price = $(this).find('.price').val();
                    $(this).find('.total').val(qty*price);

                    calc_total();
                }
            });
        }

        function calc_total()
        {
            total=0;
            $('.total').each(function()
            {
                total += parseFloat($(this).val());
            });

            $('#sub_total').val(total.toFixed(2));
            connexes= parseFloat($('#connexes').val());
            $('#total_amount').val((total-connexes).toFixed(2));
        }
        function loadbyId(i)
            {
                $(document).on('change','#article_'+i,function(){
                    var materielId=$(this).val();
                        console.log(materielId);
                        $.ajax(
                            {
                                type:'GET',
                                url:'{!! URL::to('getPrixMateriel') !!}',
                                data:{'id':materielId},
                                dataType:'json',
                                success:function(data)
                                    {
                                    console.log(data)
                                    var prixMateriel= data[0].prix;
                                    console.log(prixMateriel)
                                    var unites= data[0].abreviation;
                                    console.log(unites)
                                    $('#prix_'+i).val(prixMateriel);
                                    $('#unite_'+i).val(unites);
                                    },
                                error:function()
                                {

                                }

                            }
                        );
                    }
                );
            }

    </script>
@endsection
