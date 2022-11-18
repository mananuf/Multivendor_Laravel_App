@extends('admin.layouts.layout')
@section('content')
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <x-messages/>
                @if ($slug=="personal")
                <div class="card-body">
                    <h4 class="card-title">Update Personal Details</h4>
                    <p class="card-description">
                      {{Auth::guard('admin')->user()->name}}
                    </p>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{url('admin/update-vendor-details/personal')}}">
                      @csrf
                      
                      @foreach ($vendorDetails as $vendorDetail)
                      <div class="form-group">
                        <label for="exampleInputUsername1">Vendor name</label>
                        <input class="form-control" id="exampleInputUsername1" value="{{$vendorDetail->name}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Vendor email address</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{$vendorDetail->email}}" readonly>
                      </div>
                      
                      <div class="form-group">
                          <label for="name">Username</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$vendorDetail->name}}" name="name">
                          @if($errors)
                          @error('name')
                              <small class="text-sm text-danger">{{$message}}</small>
                          @enderror
                          @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Address<i class="fa fa-address-book-o" aria-hidden="true"></i></label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" value="{{$vendorDetail->address}}" name="address">
                            @if($errors)
                              @error('address')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
                          <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" value="{{$vendorDetail->city}}" name="city">
                            @if($errors)
                              @error('city')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>

                          <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" value="{{$vendorDetail->state}}" name="state">
                            @if($errors)
                              @error('state')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>

                          <div class="form-group">
                            <label for="country">Country</label>
                            <select name="country" 
                            id="country"
                            class="form-control text-dark @error('country') is-invalid @enderror"
                            
                             >
                             <option>select country</option>
                             @foreach ($countries as $country)
                                 <option value="{{$country->country_name}}"
                                  @if ($country->country_name==$vendorDetail->country)
                                     selected 
                                  @endif> {{ $country->country_name }}</option>
                             @endforeach
                            </select>

                            @if($errors)
                              @error('country')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
                          
                      <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" value="{{$vendorDetail->phone}}" name="phone_number">
                        @if($errors)
                          @error('phone_number')
                              <small class="text-sm text-danger">{{$message}}</small>
                          @enderror
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="image">Profile Photo</label>
                          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                          @if($errors)
                            @error('image')
                                <small class="text-sm text-danger">{{$message}}</small>
                            @enderror
                            @endif
                        </div>
                      @endforeach
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
  
                      <a class="btn btn-light" href="{{route('admin.dashboard')}}">Cancel</a>
                    </form>
                  </div>
                @endif
                {{-- business slug --}}
                @if ($slug == "business")
                <div class="card-body">
                    <h4 class="card-title">Update Business Details</h4>
                    <p class="card-description">
                      {{Auth::guard('admin')->user()->name}}
                    </p>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{url('admin/update-vendor-details/business')}}">
                      @csrf
                      
                      @foreach ($vendorDetails as $vendorDetail)
                      <div class="form-group">
                        <label for="exampleInputUsername1">Vendor name</label>
                        <input class="form-control" id="exampleInputUsername1" value="{{Auth::guard('admin')->user()->name}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Vendor email address</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}" readonly>
                      </div>
                      
                      <div class="form-group">
                          <label for="shop_name">Shop Name</label>
                          <input type="text" 
                          class="form-control @error('shop_name') is-invalid @enderror" 
                          id="shop_name" value="{{$vendorDetail->shop_name}}" 
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
                            id="shop_address" value="{{$vendorDetail->shop_address}}" 
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
                            id="shop_city" value="{{$vendorDetail->shop_city}}" 
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
                            value="{{$vendorDetail->shop_state}}" 
                            name="shop_state">
                            @if($errors)
                              @error('shop_state')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>

                          <div class="form-group">
                            <label for="shop_country">shop country</label>
                            <select name="shop_country" 
                            id="shop_country"
                            class="form-control text-dark @error('shop_country') is-invalid @enderror"
                            
                             >
                             <option>select country</option>
                             @foreach ($countries as $country)
                                 <option value="{{$country->country_name}}"
                                  @if ($country->country_name==$vendorDetail->shop_country)
                                     selected 
                                  @endif> {{ $country->country_name }}</option>
                             @endforeach
                            </select>
                            
                            @if($errors)
                              @error('country')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
                          
                      <div class="form-group">
                        <label for="shop_contact">Shop Contact</label>
                        <input type="text" 
                        class="form-control @error('shop_contact') is-invalid @enderror" 
                        id="shop_contact" value="{{$vendorDetail->shop_contact}}" 
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
                        id="shop_email" value="{{$vendorDetail->shop_email}}" 
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
                        id="shop_website" value="{{$vendorDetail->shop_website}}" 
                        name="shop_website">
                        @if($errors)
                          @error('shop_website')
                              <small class="text-sm text-danger">{{$message}}</small>
                          @enderror
                          @endif
                      </div>

                      <div class="form-group">
                        <label for="address_proof">Address Proof Credential</label>
                        <select class="form-control text-dark @error('address_proof') is-invalid @enderror" 
                        value="{{$vendorDetail->address_proof}}" 
                        name="address_proof" 
                        id="address_proof">
                        <option value="International Passport" 
                        @if ($vendorDetail->address_proof =='International Passport')
                            selected
                        @endif>International Passport</option>
                        <option value="Drivers License"
                        @if ($vendorDetail->address_proof =='Drivers License')
                            selected
                        @endif>Drivers License</option>   
                        <option value="Voters Card"
                        @if ($vendorDetail->address_proof =='Voters Card')
                            selected
                        @endif>Voters Card</option> 
                        <option value="National Id"
                        @if ($vendorDetail->address_proof =='National Id')
                            selected
                        @endif>National Id</option> 
                    </select>
                        
                        @if($errors)
                          @error('address_proof')
                              <small class="text-sm text-danger">{{$message}}</small>
                          @enderror
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="address_image">Address Proof Photo</label>
                          <input type="file" class="form-control @error('address_image') is-invalid @enderror" id="address_image" name="address_image">
                          @if($errors)
                            @error('address_image')
                                <small class="text-sm text-danger">{{$message}}</small>
                            @enderror
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="business_license_number">Business License Number</label>
                            <input type="text" 
                            class="form-control @error('business_license_number') is-invalid @enderror" 
                            id="business_license_number" 
                            value="{{$vendorDetail->business_license_number}}" 
                            name="business_license_number">
                            @if($errors)
                              @error('business_license_number')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
                      @endforeach
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
  
                      <a class="btn btn-light" href="{{route('admin.dashboard')}}">Cancel</a>
                    </form>
                  </div>
                @endif

                {{-- bank details --}}
                @if ($slug == "bank")
                <div class="card-body">
                    <h4 class="card-title">Update Bank Details</h4>
                    <p class="card-description">
                      {{Auth::guard('admin')->user()->name}}
                    </p>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{url('admin/update-vendor-details/bank')}}">
                      @csrf
                      
                      @foreach ($vendorDetails as $vendorDetail)
                      <div class="form-group">
                        <label for="exampleInputUsername1">Vendor name</label>
                        <input class="form-control" id="exampleInputUsername1" value="{{Auth::guard('admin')->user()->name}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Vendor email address</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}" readonly>
                      </div>
                      
                      <div class="form-group">
                          <label for="bank_name">Bank Name</label>
                          <input type="text" 
                          class="form-control @error('bank_name') is-invalid @enderror" 
                          id="bank_name" value="{{$vendorDetail->bank_name}}" 
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
                            value="{{$vendorDetail->account_holder_name}}" 
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
                            id="account_number" value="{{$vendorDetail->account_number}}" 
                            name="account_number">
                            @if($errors)
                              @error('account_number')
                                  <small class="text-sm text-danger">{{$message}}</small>
                              @enderror
                              @endif
                          </div>
                      @endforeach
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
  
                      <a class="btn btn-light" href="{{route('admin.dashboard')}}">Cancel</a>
                    </form>
                  </div>
                @endif
              </div>
            </div>
@endsection