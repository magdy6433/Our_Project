@extends('layouts.master')
@section('css')

@section('title')
    المستويات الدراسيه
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    المستويات الدراسيه
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">   
    <div class="col-xl-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">

          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif


          <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
            {{ trans('اضافه مستوى') }}
        </button>
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المستوى</th>
                    <th>الملاحظات</th>
                    <th>العمليات</th>
                
                </tr>
            </thead>
            <tbody>
                <?php $i  = 0; ?>
                @foreach($Levels as $Level)
                <?php $i++; ?>
               
                <tr> 
                    <td>{{$i}}</td>
                    <td>{{$Level->Name}}</td>
                    <td>{{$Level->Notes}}</td>
                    <td>
                      <button type="button" class="btn btn-info btn-sm" data-toggle="model" data-target="#edit{{$Level->id}}"
                        title="تعديل"><i class="fa fa-edit"></i></button>

                      </button>
                    </td>
                </tr>
              
                @endforeach
              
             
            </tbody>
         
            
         </table>
        </div>
        </div>
      </div>   
    </div>

    <!-- add_modal_Level -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                   id="exampleModalLabel">
                   {{ trans('Levels_trans.add_Grade') }}
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <!-- add_form -->
               <form action="{{ route('Levels.store') }}" method="POST">
                   @csrf
                   <div class="row">
                       <div class="col">
                           <label for="Name"
                                  class="mr-sm-2">{{ trans('اسم المستوى') }}
                               :</label>
                           <input id="Name" type="text" name="Name" class="form-control">
                       </div>
                       {{-- <div class="col">
                           <label for="Name_en"
                                  class="mr-sm-2">{{ trans('Levels_trans.stage_name_en') }}
                               :</label>
                           <input type="text" class="form-control" name="Name_en" required>
                       </div> --}}
                   </div>
                   <div class="form-group">
                       <label
                           for="exampleFormControlTextarea1">{{ trans('ملاحظات') }}
                           :</label>
                       <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                 rows="3"></textarea>
                   </div>
                   <br><br>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary"
                       data-dismiss="modal">{{ trans('اغلاق') }}</button>
               <button type="submit"
                       class="btn btn-success">{{ trans('حفظ البيانات') }}</button>
           </div>
           </form>

       </div>
   </div>
</div>
</div> 

@endsection
@section('js')

@endsection
