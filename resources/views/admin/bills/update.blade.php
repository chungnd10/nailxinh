@extends('admin.layouts.index')
@section('content')
    <section class="content-header">
        <h1>
            Hoá đơn
        </h1>
    </section>
    <section class="content">
        <div class="box box-default">
            <form action="{{ route('bills.update', Hashids::encode($bill->id, '123456789')) }}"
                  method="POST"
                  id="updateBill">
                @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label>Trạng thái</label><span class="text-danger">*</span>
                                <select name="bill_status_id" class="form-control">
                                    @foreach($bill_status as $item)
                                        <option value="{{ $item->id }}"
                                                @if($item->id == $bill->bill_status_id)
                                                    selected
                                                @endif
                                        >{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <textarea  class="form-control"
                                           name="note"
                                           cols="30"
                                           rows="6"
                                >{{ $bill->note }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer ">
                    <a href="{{ route('branch.index') }}"
                       class="btn btn-default"
                    >
                        <i class="fa fa-arrow-circle-o-left"></i>
                        Trở về
                    </a>
                    <button type="submit" class="btn btn-success ">
                        <i class="fa fa-save"></i>
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection
