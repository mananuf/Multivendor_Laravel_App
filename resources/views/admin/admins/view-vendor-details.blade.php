@extends('admin.layouts.layout')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <x-messages/>
                <div class="row d-flex justify-content-between">
                    <div class="card-body col-md-6">
                        <h4 class="card-title">Personal Details</h4>
                        
                        <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{url('admin/update-vendor-details/personal')}}">
                          @csrf
                          <p class="card-description">
                            {{$vendorDetail['vendor_personal']['name']}} personal details.
                          </p>
                          <div class="form-group">
                            <label for="exampleInputUsername1">Vendor name</label>
                            <input class="form-control" id="exampleInputUsername1" readonly value="{{$vendorDetail['vendor_personal']['name']}}" readonly>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Vendor email address</label>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Email" readonly value="{{$vendorDetail['vendor_personal']['email']}}" readonly>
                          </div>
                          
                            <div class="form-group">
                                <label for="address">Address<i class="fa fa-address-book-o" aria-hidden="true"></i></label>
                                <input type="text" 
                                class="form-control @error('address') is-invalid @enderror" 
                                id="address" 
                                readonly value="{{$vendorDetail['vendor_personal']['address']}}" 
                                name="address" 
                                readonly>
                              </div>
                              <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" 
                                class="form-control @error('city') is-invalid @enderror" 
                                id="city" 
                                readonly value="{{$vendorDetail['vendor_personal']['city']}}" 
                                name="city"
                                readonly>
                              </div>
    
                              <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" 
                                class="form-control @error('state') is-invalid @enderror" 
                                id="state" readonly 
                                value="{{$vendorDetail['vendor_personal']['state']}}" 
                                name="state">
                              </div>
    
                              <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" 
                                class="form-control @error('country') is-invalid @enderror" 
                                id="country" readonly value="{{$vendorDetail['vendor_personal']['country']}}" 
                                name="country" readonly>
                                @if($errors)
                                  @error('country')
                                      <small class="text-sm text-danger">{{$message}}</small>
                                  @enderror
                                  @endif
                              </div>
                              
                          <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" 
                            class="form-control @error('phone_number') is-invalid @enderror" 
                            id="phone_number"
                            value="{{$vendorDetail['vendor_personal']['phone']}}" name="phone_number" readonly>
                          </div>
                          <div class="form-group">
                              <label for="image">Profile Photo</label>
                              <img src="{{$vendorDetail['image'] ? asset('storage/admin/'.$vendorDetail['image']): asset('img/default_user.png')}}" alt="">
                            </div>
                         
                          <button type="submit" class="btn btn-primary mr-2">Update</button>
      
                          <a class="btn btn-light" href="{{route('admin.dashboard')}}">Cancel</a>
                        </form>
                      </div>
                    
                    {{-- business slug --}}
                    <div class="card-body col-md-6">
                        <h4 class="card-title">Business Details</h4>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{url('admin/update-vendor-details/business')}}">
                          @csrf
                          
                          <p class="card-description">
                            {{$vendorDetail['vendor_personal']['name']}} business details.
                          </p>
                          <div class="form-group">
                              <label for="shop_name">Shop Name</label>
                              <input type="text" 
                              class="form-control @error('shop_name') is-invalid @enderror" 
                              id="shop_name" readonly value="{{$vendorDetail['vendor_business']['shop_name']}}" 
                              name="shop_name">
                              @if($errors)
                              @error('shop_name')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                            </div>
    
                            <div class="form-group">
                                <label for="shop_address">Shop Address</label>
                                <input type="text" 
                                class="form-control @error('shop_address') is-invalid @enderror" 
                                id="shop_address" readonly value="{{$vendorDetail['vendor_business']['shop_address']}}" 
                                name="shop_address">
                                @if($errors)
                                @error('shop_address')
                                    <small class="text-sm text-danger">{{$message}}</small>
                                @enderror
                                @endif
                              </div>
    
                              <div class="form-group">
                                <label for="shop_city">Shop City</label>
                                <input type="text" 
                                class="form-control @error('shop_city') is-invalid @enderror" 
                                id="shop_city" readonly value="{{$vendorDetail['vendor_business']['shop_city']}}" 
                                name="shop_city">
                                @if($errors)
                                  @error('shop_city')
                                      <small class="text-sm text-danger">{{$message}}</small>
                                  @enderror
                                  @endif
                              </div>
    
                              <div class="form-group">
                                <label for="shop_state">Shop State</label>
                                <input type="text" 
                                class="form-control @error('shop_state') is-invalid @enderror" 
                                id="shop_state" 
                                readonly value="{{$vendorDetail['vendor_business']['shop_state']}}" 
                                name="shop_state">
                                @if($errors)
                                  @error('shop_state')
                                      <small class="text-sm text-danger">{{$message}}</small>
                                  @enderror
                                  @endif
                              </div>
    
                              <div class="form-group">
                                <label for="shop_country">Shop Country</label>
                                <input type="text" 
                                class="form-control @error('shop_country') is-invalid @enderror" 
                                id="shop_country" readonly value="{{$vendorDetail['vendor_business']['shop_country']}}" 
                                name="shop_country">
                                @if($errors)
                                  @error('shop_country')
                                      <small class="text-sm text-danger">{{$message}}</small>
                                  @enderror
                                  @endif
                              </div>
                              
                          <div class="form-group">
                            <label for="shop_contact">Shop Contact</label>
                            <input type="text" 
                            class="form-control @error('shop_contact') is-invalid @enderror" 
                            id="shop_contact" readonly value="{{$vendorDetail['vendor_business']['shop_contact']}}" 
                            name="shop_contact">
                            @if($errors)
                              @error('shop_contact')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
                          <div class="form-group">
                            <label for="shop_email">Shop Email</label>
                            <input type="text" 
                            class="form-control @error('shop_email') is-invalid @enderror" 
                            id="shop_email" readonly value="{{$vendorDetail['vendor_business']['shop_email']}}" 
                            name="shop_email">
                            @if($errors)
                              @error('shop_email')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
                          <div class="form-group">
                            <label for="shop_website">Shop Website</label>
                            <input type="text" 
                            class="form-control @error('shop_website') is-invalid @enderror" 
                            id="shop_website" readonly value="{{$vendorDetail['vendor_business']['shop_website']}}" 
                            name="shop_website">
                            @if($errors)
                              @error('shop_website')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
    
                          <div class="form-group">
                            <label for="address_proof">Address Proof Credential</label>
                            <input class="form-control @error('address_proof') is-invalid @enderror" 
                            readonly value="{{$vendorDetail['vendor_business']['address_proof']}}" 
                            name="address_proof" 
                            id="address_proof">
                            
                          </div>

                          <div class="form-group">
                              <label for="address_image">Address Proof Photo</label>
                              <img src="{{asset('storage/address/address'.$vendorDetail['vendor_business']['address_image'])}}" alt="Valid address validation">
                            </div>
    
                            <div class="form-group">
                                <label for="business_license_number">Business License Number</label>
                                <input type="text" 
                                class="form-control @error('business_license_number') is-invalid @enderror" 
                                id="business_license_number" 
                                readonly value="{{$vendorDetail['vendor_business']['business_license_number']}}" 
                                name="business_license_number">
                                @if($errors)
                                  @error('business_license_number')
                                      <small class="text-sm text-danger">{{$message}}</small>
                                  @enderror
                                  @endif
                              </div>
                          
                          <button type="submit" class="btn btn-primary mr-2">Update</button>
      
                          <a class="btn btn-light" href="{{route('admin.dashboard')}}">Cancel</a>
                        </form>
                      </div>
                </div>
                

                {{-- bank details --}}
                
                <div class="card-body col-md-6">
                    <h4 class="card-title">Update Bank Details</h4>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{url('admin/update-vendor-details/bank')}}">
                      @csrf
                      <p class="card-description">
                        {{$vendorDetail['vendor_personal']['name']}} bank details.
                      </p>
                      <div class="form-group">
                          <label for="bank_name">Bank Name</label>
                          <input type="text" 
                          class="form-control @error('bank_name') is-invalid @enderror" 
                          id="bank_name" readonly value="{{$vendorDetail['vendor_bank']['bank_name']}}" 
                          name="bank_name">
                          @if($errors)
                          @error('bank_name')
                              <small class="text-sm text-danger">{{$message}}</small>
                          @enderror
                          @endif
                        </div>
                        <div class="form-group">
                            <label for="account_holder_name">Account Name</label>
                            <input type="text" 
                            class="form-control @error('account_holder_name') is-invalid @enderror" 
                            id="account_holder_name" 
                            readonly value="{{$vendorDetail['vendor_bank']['account_holder_name']}}" 
                            name="account_holder_name">
                            @if($errors)
                              @error('account_holder_name')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
                          <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" 
                            class="form-control @error('account_number') is-invalid @enderror" 
                            id="account_number" readonly value="{{$vendorDetail['vendor_bank']['account_number']}}" 
                            name="account_number">
                            @if($errors)
                              @error('account_number')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
                      
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
  
                      <a class="btn btn-light" href="{{route('admin.dashboard')}}">Cancel</a>
                    </form>
                  </div> 
                
              </div>
            </div>
@endsection