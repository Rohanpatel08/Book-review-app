<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Review App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    @include('components.navbar')

    <div class="container">
        <div class="row my-5">
            <div class="col-md-3">
                @include('components.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card border-0 shadow">
                    <div class="card-header  text-white">
                        Edit Review of <strong>{{$review->book->title}}</strong>
                    </div>
                    <div class="card-body pb-0">
                        <form action="{{route('userReviews.update',$review->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="review" class="form-label">Review</label>
                                    <textarea name="review" rows="5" id="review" class="form-control @error('review') is-invalid @enderror">{{old('review',$review->review)}}</textarea>
                                    @error('review')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ratings" class="form-label">Ratings</label>
                                    <select name="ratings" id="ratings" class="form-control @error('ratings') is-invalid @enderror">
                                        <option value="1" {{old('status',$review->ratings)==1?'selected':''
                                        }}>1.0</option>
                                        <option value="2" {{old('status',$review->ratings)==2?'selected':''
                                        }}>2.0</option>
                                        <option value="3" {{old('status',$review->ratings)==3?'selected':''
                                        }}>3.0</option>
                                        <option value="4" {{old('status',$review->ratings)==4?'selected':''
                                        }}>4.0</option>
                                        <option value="5" {{old('status',$review->ratings)==5?'selected':''
                                        }}>5.0</option>
                                    </select>
                                    @error('ratings')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary mt-2 btn-sm">Update</button>
                                <a href="{{route('userReviews')}}" class="btn btn-danger btn-sm mt-2 mx-1">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>