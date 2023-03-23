<div>
    @include('navbar.navbarwwtp')
    @if (session()->has('message'))
    <div class="alert alert-success text-center">{{ session('message') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <div class="row">

            <div class="col-md-8 me-auto text-left">
            <h5>Asset WWTP dan STP</h5>
            <p>Warehouse adalah pekerjaan yang melibatkan peyimpanan produk atau barang serta menyediakan informasi mengenai status dan kondisi barang tersebut di gudang yang kemudian perusahaan distribusikan sesuai permintaan ke tujuan yang telah mereka tentukan.</p>
            </div>

            </div>


            <div class="row mt-lg-4 mt-2">
                @foreach($items as $item)
            <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
            <div class="card-body p-3">
            <div class="d-flex">
            <div class="avatar avatar-xl bg-gradient-dark border-radius-md p-2" id="gambar">
                <a href="{{ asset('storage/' . $item->image) }}" itemprop="contentUrl" data-size="500x600" target="_blank">
                <img class="img-fluid mb-2 mt-3" src="{{ asset('storage/' . $item->image) }}"  >
            </a>
            </div>
            <div class="ms-3 my-auto">
            <h6>{{ $item->nama_barang }}</h6>

            </div>
            <div class="ms-auto">
            <div class="dropdown">
            <button class="btn btn-link text-secondary ps-0 pe-2" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v text-lg"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end me-sm-n4 me-n3" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="javascript:;">Edit</a>
            <a class="dropdown-item" href="javascript:;">Hapus</a>
            </div>
            </div>
            </div>
            </div>
            <p class="text-sm mt-3"> {{ $item->keterangan }} </p>
            <hr class="horizontal dark">
            <div class="row">
            <div class="col-6">
            <h6 class="text-sm mb-0">
@if ($item->status == 1)
    Bagus
@elseif ($item->status == 2)
    Rusak
    @else
    Perbaikan
@endif


            </h6>
            </div>
            <div class="col-6 text-end">
            <p class="text-secondary text-sm font-weight-bold mb-0">{{ date('d F Y', strtotime($item->created_at)) }} </p>
            </div>
            </div>
            </div>
            </div>

            </div>
            @endforeach


        <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center text-center">
        <a href="javascript:;"   data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-plus text-secondary mb-3"></i>
        <h5 class=" text-secondary"> New Asset </h5>
        </a>
        </div>
        </div>
        </div>
        </div>
        <div class="my-gallery d-flex mt-4 pt-2" itemscope itemtype="http://schema.org/ImageGallery">
            @foreach($items as $item)
            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
            <a href="{{ asset('storage/' . $item->image) }}" itemprop="contentUrl" data-size="500x600">
            <img class="w-75 min-height-100 max-height-100 border-radius-lg shadow" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->nama_barang }}" />
            </a>
            </figure>

            @endforeach
            </div>
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                <div class="pswp__bg"></div>

                <div class="pswp__scroll-wrap">


                <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                </div>

                <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">

                <div class="pswp__counter"></div>
                <button class="btn btn-white btn-sm pswp__button pswp__button--close">Close (Esc)</button>
                <button class="btn btn-white btn-sm pswp__button pswp__button--fs">Fullscreen</button>
                <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--left">Prev
                </button>
                <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--right">Next
                </button>


                <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
                </div>
                </div>
                </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
                </div>
                <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
                </div>
                </div>
                </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Silahkan Isi Form....</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-lg-12 col-12 mx-auto">
                              <div class="card card-body mt-4">
                                <h6 class="mb-0">New Item</h6>
                                <p class="text-sm mb-0">Create new Item</p>
                                <hr class="horizontal dark my-3">
                                <form wire:submit.prevent="add()" enctype="multipart/form-data">
                                  <label for="projectName" class="form-label">Nama Barang</label>
                                  <input type="text" class="form-control mb-2" id="projectName"  wire:model.defer="nama_barang">
                                  <label for="projectName" class="form-label">Lokasi</label>
                                  <input type="text" class="form-control mb-2" id="projectName"  wire:model.defer="lokasi">
                                  <label for="projectName" class="form-label">Status</label>
                                  <select class="form-select mb-2" aria-label="Default select example"  wire:model.defer="status">
                                    <option selected>Pilih</option>
                                    <option value="1">Bagus</option>
                                    <option value="2">Rusak</option>
                                    <option value="3">Perbaikan</option>
                                  </select>
                                  <label for="projectName" class="form-label">Deskripsi</label>
                                  <textarea class="form-control mb-2"  wire:model.defer="keterangan">
                                  </textarea>

                                  <label class="mt-4 form-label">Upload Image</label>

                                  <div class="fallback">
                                    <input type="file"  wire:model.defer="image">
                                    @error('image') <span class="error">{{ $message }}</span> @enderror
                                  </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" data-bs-dismiss="modal">
                        </form>
                            <span wire:loading.remove>Save changes</span>
                            <span wire:loading>
                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                              Loading...
                            </span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>








          @section('datarange')
              <style>
.avatar img {
  width: 100% !important;
  height: 100% !important;
  object-fit: cover !important;
}

#gambar img {
  position: relative;
  transition: all 0.3s ease-in-out;
  width: 100% !important;
}

#gambar:hover img {
  transform: scale(1.2) !important;
}



              </style>
          @endsection
@section('grafik')

<script src="/assets/js/plugins/dropzone.min.js"></script>
<script src="./assets/js/plugins/photoswipe.min.js"></script>
<script src="./assets/js/plugins/photoswipe-ui-default.min.js"></script>
<script>
     var initPhotoSwipeFromDOM = function(gallerySelector) {

// parse slide data (url, title, size ...) from DOM elements
// (children of gallerySelector)
var parseThumbnailElements = function(el) {
  var thumbElements = el.childNodes,
    numNodes = thumbElements.length,
    items = [],
    figureEl,
    linkEl,
    size,
    item;

  for (var i = 0; i < numNodes; i++) {

    figureEl = thumbElements[i]; // <figure> element
    // include only element nodes
    if (figureEl.nodeType !== 1) {
      continue;
    }

    linkEl = figureEl.children[0]; // <a> element

    size = linkEl.getAttribute('data-size').split('x');

    // create slide object
    item = {
      src: linkEl.getAttribute('href'),
      w: parseInt(size[0], 10),
      h: parseInt(size[1], 10)
    };

    if (figureEl.children.length > 1) {
      // <figcaption> content
      item.title = figureEl.children[1].innerHTML;
    }

    if (linkEl.children.length > 0) {
      // <img> thumbnail element, retrieving thumbnail url
      item.msrc = linkEl.children[0].getAttribute('src');
    }

    item.el = figureEl; // save link to element for getThumbBoundsFn
    items.push(item);
  }

  return items;
};

// find nearest parent element
var closest = function closest(el, fn) {
  return el && (fn(el) ? el : closest(el.parentNode, fn));
};

// triggers when user clicks on thumbnail
var onThumbnailsClick = function(e) {
  e = e || window.event;
  e.preventDefault ? e.preventDefault() : e.returnValue = false;

  var eTarget = e.target || e.srcElement;

  // find root element of slide
  var clickedListItem = closest(eTarget, function(el) {
    return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
  });

  if (!clickedListItem) {
    return;
  }

  // find index of clicked item by looping through all child nodes
  // alternatively, you may define index via data- attribute
  var clickedGallery = clickedListItem.parentNode,
    childNodes = clickedListItem.parentNode.childNodes,
    numChildNodes = childNodes.length,
    nodeIndex = 0,
    index;

  for (var i = 0; i < numChildNodes; i++) {
    if (childNodes[i].nodeType !== 1) {
      continue;
    }

    if (childNodes[i] === clickedListItem) {
      index = nodeIndex;
      break;
    }
    nodeIndex++;
  }



  if (index >= 0) {
    // open PhotoSwipe if valid index found
    openPhotoSwipe(index, clickedGallery);
  }
  return false;
};

// parse picture index and gallery index from URL (#&pid=1&gid=2)
var photoswipeParseHash = function() {
  var hash = window.location.hash.substring(1),
    params = {};

  if (hash.length < 5) {
    return params;
  }

  var vars = hash.split('&');
  for (var i = 0; i < vars.length; i++) {
    if (!vars[i]) {
      continue;
    }
    var pair = vars[i].split('=');
    if (pair.length < 2) {
      continue;
    }
    params[pair[0]] = pair[1];
  }

  if (params.gid) {
    params.gid = parseInt(params.gid, 10);
  }

  return params;
};

var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
  var pswpElement = document.querySelectorAll('.pswp')[0],
    gallery,
    options,
    items;

  items = parseThumbnailElements(galleryElement);

  // define options (if needed)
  options = {

    // define gallery index (for URL)
    galleryUID: galleryElement.getAttribute('data-pswp-uid'),

    getThumbBoundsFn: function(index) {
      // See Options -> getThumbBoundsFn section of documentation for more info
      var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
        pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
        rect = thumbnail.getBoundingClientRect();

      return {
        x: rect.left,
        y: rect.top + pageYScroll,
        w: rect.width
      };
    }

  };

  // PhotoSwipe opened from URL
  if (fromURL) {
    if (options.galleryPIDs) {
      // parse real index when custom PIDs are used
      // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
      for (var j = 0; j < items.length; j++) {
        if (items[j].pid == index) {
          options.index = j;
          break;
        }
      }
    } else {
      // in URL indexes start from 1
      options.index = parseInt(index, 10) - 1;
    }
  } else {
    options.index = parseInt(index, 10);
  }

  // exit if index not found
  if (isNaN(options.index)) {
    return;
  }

  if (disableAnimation) {
    options.showAnimationDuration = 0;
  }

  // Pass data to PhotoSwipe and initialize it
  gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
  gallery.init();
};

// loop through all gallery elements and bind events
var galleryElements = document.querySelectorAll(gallerySelector);

for (var i = 0, l = galleryElements.length; i < l; i++) {
  galleryElements[i].setAttribute('data-pswp-uid', i + 1);
  galleryElements[i].onclick = onThumbnailsClick;
}

// Parse URL and open gallery if it contains #&pid=3&gid=1
var hashData = photoswipeParseHash();
if (hashData.pid && hashData.gid) {
  openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
}
};

// execute above function
initPhotoSwipeFromDOM('.my-gallery');
</script>
@endsection
