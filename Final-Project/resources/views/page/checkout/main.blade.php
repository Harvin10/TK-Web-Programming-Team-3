<x-app-layout title="Checkout">
    <section id="page-title">
        <div class="container clearfix" style="background-color:#65c4eb">
            <h1>
                Transaction Information
            </h1>
        </div>
    </section>
    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <form id="form_input">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="card_name">Card Name <small>*</small></label>
                            <input type="text" id="card_name" name="card_name" class="sm-form-control required" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="card_number">Card Number <small>*</small></label>
                            <input type="text" id="card_number" name="card_number" class="sm-form-control required" />
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6 form-group row">
                            <label for="developer">Expired Date <small>*</small></label>
                            <div class="col-md-6">
                                <input type="text" id="expired_month" name="expired_month" class="sm-form-control required" />
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="expired_year" name="expired_year" class="sm-form-control required" />
                            </div>
                       </div>
                        <div class="col-md-6 form-group">
                            <label for="developer">CVV <small>*</small></label>
                            <input type="text" id="cvv" name="cvv" class="sm-form-control required" />
                       </div>
                        <div class="w-100"></div>
                        <div class="col-md-6 form-group">
                            <label for="title">Country <small>*</small></label>
                            <select class="form-control" id="country" name="country">
                                <option value="" selected disabled>Choose Country</option>
                                <option value="id">Indonesia</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="zip_code">ZIP Code <small>*</small></label>
                            <input type="text" id="zip_code" name="zip_code" class="sm-form-control required" />
                        </div>
                        <div class="col-12 form-group">
                            <button class="button button-3d m-0" onclick="handle_save('#tombol_simpan','#form_input','{{route('checkout.store')}}','POST');" id="tombol_simpan">Checkout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-app-layout>