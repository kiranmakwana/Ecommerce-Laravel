@extends('user.layout.sidebar',['title'=>'My Address'])
@section('content')
    <div id="card" class="card card-custom">
        <div class="row">
            <div class="col-md-12 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>DELIVERY ADDRESS</b></h4>
                        </div>
                        <div
                            class="col align-self-center text-right text-muted">
                            <a class="btn btn-info" href="">Add New Address</a>
                        </div>
                    </div>
                </div>
                @foreach($address as $i)
                    <div id="id_{{ $i->id }}" class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-1">
                                <input class="custom-radio" type="radio" name="address" value="1"
                                       id="address">
                            </div>
                            <div class="col">
                                <div class="col">
                                    <b class="mr-3">
                                        {{ $i->name }}
                                    </b>
                                    <span class="small ml-4" style="color: #878787;background-color: #f0f0f0">
                                        {{ $i->type }}
                                    </span>
                                    <span class="ml-4">
                                        {{ $i->mobile_number }}
                                    </span>
                                </div>
                                <div class="row text-dart">
                                    <span class="">
                                        {{ $i->address }}
                                    </span>
                                    <span class="">
                                        {{ $i->city->name }}, {{ $i->state->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="col align-self-center text-right ">
                                <a href="" class="text-primary text-primary">EDIT</a>
                                <a href="#delete_address" class="passingID text-danger"
                                   data-id="{{ $i->id }}"
                                   data-obj="id_{{ $i->id }}"
                                   data-bs-toggle="modal"
                                >DELETE</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--<div class="row border-top border-bottom">
                    <div class="row main align-items-center">
                        <div class="col-1 mt-0">
                            <input class="custom-radio" type="radio" name="address" value="1" id="address">
                        </div>
                        <div class="col">
                            <b class="mr-3">
                                EDIT ADDRESS
                            </b>
                            <div class="col">
                                <input type="text" name="name" class="form-control input-group-lg" id=""
                                       style="padding: 10px 16px 0 13px; ">
                                <lable for="name" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Name
                                </lable>
                            </div>
                            <div class="col">
                                <input type="text" name="mobile" class="form-control input-group-lg" id=""
                                       style="padding: 10px 16px 0 13px; ">
                                <lable for="mobile" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Mobile
                                </lable>
                            </div>
                            <div class="col">
                                <input type="text" name="zipcode" class="form-control input-group-lg" id=""
                                       style="padding: 10px 16px 0 13px; ">
                                <lable for="zipcode" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Zipcode
                                </lable>
                            </div>
                            <div class="col">
                                <input type="text" name="locality" class="form-control input-group-lg" id=""
                                       style="padding: 10px 16px 0 13px; ">
                                <lable for="locality" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Locality
                                </lable>
                            </div>
                            <div class="col">
                                <x-state class="input-group-lg"/>
                                <lable for="state" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    State
                                </lable>
                            </div>
                            <div class="col">
                                <x-city class="input-group-lg"/>
                                <lable for="city" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    State
                                </lable>
                            </div>
                            <div class="col">
                                <textarea name="address" class="form-control input-group-lg" id=""
                                          style="padding: 10px 16px 0 13px;"
                                ></textarea>
                                <lable for="address" class="small"
                                       style="position: absolute;top: -3px;left: 0;padding: 0px 20px 20px 20px;color: #878787">
                                    Address
                                </lable>
                            </div>

                        </div>
                        <div class="col align-self-center text-right text-muted">
                            <a href="" class="text-primary text-primary">EDIT</a>
                        </div>
                    </div>
                </div>--}}
                <div class="back-to-shop mt-4">
                    <a class="btn btn-info mt-4" style="width: 25%" href="{{ route('user.cart.index') }}">Back </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_address" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
         data-bs-dismiss="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel"><strong>DELETE ADDRESS</strong></h5>
                    <a type="button" id="model-close" class="btn-close model-close" data-bs-dismiss="modal"
                       aria-label="Close"
                       style="font-size: 18px;">x</a>
                </div>
                x
                <div class="modal-body">
                    <p>Are you sure you want to remove this address?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: #c6c8ca" class="btn model-close2" data-bs-dismiss="modal"
                            aria-label="Close">CANCEL
                    </button>
                    <a id="route">
                        <button class="btn btn-danger">
                            DELETE
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('css/viewCart.css') }}">
@endpush
@push('script')
    <script>
        $(".passingID").click(function () {
            var id = $(this).attr('data-id');
            var obj = $(this).attr('data-obj');
            console.log(obj)
            $("#route").attr("onclick", 'removeAddress(' + id + ',' + obj + ')');
            $('#delete_address').modal('toggle');
        });
    </script>
    <script>
        function removeAddress(id, obj) {
            console.log(id, obj)
            $.ajax({
                'url': '{{ route('user.address.delete',2) }}',
                'type': 'GET',
                success: function (response) {
                    // $('#delete_address').modal('close');
                    obj.remove();
                    $(".model-close2").click();
                },
            });
        }
    </script>
@endpush
