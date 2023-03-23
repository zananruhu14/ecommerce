<div>

    <div class="row my-3 justify-content-between">

        <div class="col-3">
            <div class="input-group input-group-sm mb-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2" wire:model="search">
              </div>
            </div>
        </div>
        <div class="col-3">
            <div class="input-group input-group-sm mb-3">
            <div class="input-group mb-3">
                <button   class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#add" >+&nbsp; New Customer</button>
              </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="datatable-search">
            <thead class="table-dark">
                <tr>
                    <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">NAME</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">PHONE</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">ADDRESS</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">STATUS</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">EMAIL</th>
                  <th class="text-uppercase  text-xxs font-weight-bolder opacity-7">AKSI</th>
                </tr>
              </thead>
              <tbody>
           @foreach ($customers as $item)
                      <tr>

                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        {{ $item->name }}
                                    </h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        {{ $item->phone }}
                                    </h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        {{ $item->address }}
                                    </h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        {{ $item->status }}
                                    </h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="my-2 text-xs text-wrap">
                                      {{ $item->email }}
                                  </h6>
                                </div>
                              </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="my-2 text-xs text-wrap">
                                        <i class="fas fa-user-edit text-secondary" data-bs-toggle="modal" data-bs-target="#edit" wire:click="edit_id({{ $item->id }})"></i>
                                        <i class="fas fa-trash text-secondary" data-bs-toggle="modal" data-bs-target="#modal-notification" wire:click="delete({{ $item->id }})"></i>
                                    </h6>
                                  </div>
                                </div>
                              </td>



                        </tr>
              @endforeach


                  </tbody>
                  </table>
                </div>
                {{ $customers->links() }}
    </div>



</div>



{{-- add --}}
<div wire:ignore.self  class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="text-gradient text-danger mt-4">Form  Customer</h4>
                <p>{{ __('silahkan_isi_form') }}</p>
              </div>
          <form  wire:submit.prevent="store()">
            @csrf

            <div class="form-group">
                <label for="exampleFormControlInput2">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="name" placeholder="" wire:model="name" required>
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                <label for="exampleFormControlInput2">Phone</label>
                <input  type="tel" pattern="(\+62|62|0)8[1-9][0-9]{6,9}$" class="form-control" id="exampleFormControlInput2" name="phone" placeholder="" wire:model="phone" required>
                @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                <label for="exampleFormControlInput2">Address</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="address" placeholder="" wire:model="address" required>
                @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                <label for="exampleFormControlInput2">Status</label>
                <select  class="form-control" wire:model="status">
                    <option value="0" selected>-- Choose Status --</option>
                    <option value="Active" selected>Active</option>
                    <option value="Inactive">Inactive</option>


                </select>
                <label for="exampleFormControlInput2">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput2" name="name" placeholder="" wire:model="email" required>

            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="resetInputFields()">{{ __('close') }}</button>
          <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">{{ __('save') }}</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  {{-- edit --}}
  <div wire:ignore.self  class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="text-gradient text-danger mt-4">Form Customer</h4>
                <p>{{ __('silahkan_isi_form') }}</p>
              </div>
          <form  wire:submit.prevent="edit()">
            @csrf

            <div class="form-group">
                <label for="exampleFormControlInput2">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="name" placeholder=""  wire:model="name" required>
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                <label for="exampleFormControlInput2">Phone</label>
                <input  type="tel" pattern="(\+62|62|0)8[1-9][0-9]{6,9}$" class="form-control" id="exampleFormControlInput2" name="phone" placeholder=""  wire:model="phone" required>
                @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                <label for="exampleFormControlInput2">Address</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="address" placeholder=""  wire:model="address" required>
                @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                <label for="exampleFormControlInput2">Status</label>
                <select  class="form-control" wire:model="status">
                    @if ( $status == 'active')
                    <option value="{{ $status }}" selected>{{ $status }}</option>
                    <option value="Inactive">Inactive</option>
                    @else
                    <option value="{{ $status }}" selected>{{ $status }}</option>
                    <option value="Active" selected>Active</option>
                    @endif


                </select>
                <label for="exampleFormControlInput2">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput2" name="name" placeholder="" wire:model="email" required>

            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" wire:click.prevent="resetInputFields()">{{ __('close') }}</button>
          <button type="submit" class="btn bg-gradient-primary" data-bs-dismiss="modal">{{ __('save') }}</button>
        </form>
        </div>
      </div>
    </div>
  </div>


  {{-- delete --}}


</div>




