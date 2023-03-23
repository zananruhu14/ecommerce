<div>
    <div class="row">
        <div class="col-12">
        <div class="multisteps-form">
        <div class="row">
        <div class="col-12 col-lg-8 mx-auto mt-4 mb-sm-5 mb-3">
        <div class="multisteps-form__progress">
        <button class="multisteps-form__progress-btn js-active" type="button" title="Product Info">
        <span>1. Product Info</span>
        </button>
        <button class="multisteps-form__progress-btn" type="button" title="Media">2. Media</button>
        <button class="multisteps-form__progress-btn" type="button" title="Socials">3. Socials</button>
        <button class="multisteps-form__progress-btn" type="button" title="Pricing">4. Pricing</button>
        </div>
        </div>
        </div>

        <div class="row">
        <div class="col-12 col-lg-8 m-auto">
        <form class="multisteps-form__form mb-8" wire:submit.prevent="createProduct()">

        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
        <h5 class="font-weight-bolder">Product Information</h5>
        <div class="multisteps-form__content">
        <div class="row mt-3">
        <div class="col-12 col-sm-6">
        <label>Name</label>
        <input class="multisteps-form__input form-control" type="text" placeholder="eg. Off-White" wire:model.defer="name" required/>
        @error('name') <span>{{ $message }}</span> @enderror
        </div>
        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
        <label>Weight</label>
        <input class="multisteps-form__input form-control" type="text" placeholder="eg. 42" wire:model.defer="weight" required/>
        @error('weight') <span>{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="row">
        <div class="col-sm-6">
        <label class="mt-4">Description</label>
            <textarea class="form-control" cols="30" rows="10"  wire:model.defer="description" required></textarea>
            @error('description') <span>{{ $message }}</span> @enderror
        </div>
        <div class="col-sm-6 mt-sm-0 mt-4">
        <label class="mt-4">Category</label>
        <select class="form-control" wire:model.defer="category" required id="choices-category">
        <option value="Sweater" selected="">Sweater</option>
        <option value="Hoodie">Hoodie</option>
        <option value="Clothing">Clothing</option>

        </select>
        <label>Sizes</label>
        <select class="form-control" id="choices-sizes"  wire:model.defer="size">
        <option value="Choice 1" selected="">Medium</option>
        <option value="Choice 2">Small</option>
        <option value="Choice 3">Large</option>
        <option value="Choice 4">Extra Large</option>
        <option value="Choice 5">Extra Small</option>
        </select>
        </div>
        </div>
        <div class="button-row d-flex mt-4">
        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
        </div>
        </div>
        </div>

        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
        <h5 class="font-weight-bolder">Media</h5>
        <div class="multisteps-form__content">
        <div class="row mt-3">
        <div class="col-12">
        <label>Product images</label>
        <div action="/file-upload" class="form-control dropzone" id="productImg">    <input name="file" type="file" /></div>
         </div>
        </div>
        <div class="button-row d-flex mt-4">
        <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
        </div>
        </div>
        </div>

        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
        <h5 class="font-weight-bolder">Socials</h5>
        <div class="multisteps-form__content">
        <div class="row mt-3">
        <div class="col-12">
        <label>Twiiter Account</label>
        <input class="multisteps-form__input form-control" type="text"  placeholder="https://..." wire:model.defer="tw_account" />
        </div>
        <div class="col-12 mt-3">
        <label>Facebook Account</label>
        <input class="multisteps-form__input form-control" type="text" placeholder="https://..."  wire:model.defer="fb_account"/>
        </div>
        <div class="col-12 mt-3">
        <label>Instagram Account</label>
        <input class="multisteps-form__input form-control" type="text" placeholder="https://..."  wire:model.defer="ig_account"/>
        </div>
        </div>
        <div class="row">
        <div class="button-row d-flex mt-4 col-12">
        <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
        </div>
        </div>
        </div>
        </div>

        <div class="card multisteps-form__panel p-3 border-radius-xl bg-white h-100" data-animation="FadeIn">
        <h5 class="font-weight-bolder">Pricing</h5>
        <div class="multisteps-form__content mt-3">
        <div class="row">
        <div class="col-3">
        <label>Price</label>
        <input class="multisteps-form__input form-control" type="text" placeholder="99.00"  wire:model.defer="price"/>
        </div>
        <div class="col-4">
        <label>Currency</label>
        <select class="form-control" name="choices-sizes" id="choices-currency" wire:model="currency">
        <option value="IDR" selected="">IDR</option>
        <option value="USD">USD</option>
        <option value="GBP">GBP</option>
        <option value="CNY">CNY</option>
        <option value="INR">INR</option>
        <option value="BTC">BTC</option>
        </select>
        </div>

        </div>
        <div class="row">
        <div class="col-12">
        <label class="mt-4 form-label">Tags</label>
        <select class="form-control" name="choices-tags" id="choices-tags" multiple wire:model.defer="tags">
        <option value="Choice 1" selected>In Stock</option>
        <option value="Choice 2">Out of Stock</option>
        <option value="Choice 3">Sale</option>
        <option value="Choice 4">Black Friday</option>
         </select>
        </div>
        </div>
        <div class="button-row d-flex mt-4">
        <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Send</button>
        </div>
        </div>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>

</div>
