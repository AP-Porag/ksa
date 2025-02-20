@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">{{get_page_meta('title', true)}}</h4>

                    <form action="{{ route('admin.label.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Description One<span class="error">*</span></label>
                                    <input type="text" name="description_one" class="form-control" required=""
                                           value="{{ old('description_one') }}">
                                    @error('description_one')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Description Two<span class="error">*</span></label>
                                    <input type="text" name="description_two" class="form-control" required=""
                                           value="{{ old('description_two') }}">
                                    @error('description_two')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Description Three<span class="error">*</span></label>
                                    <input type="text" name="description_three" class="form-control" required=""
                                           value="{{ old('description_three') }}">
                                    @error('description_three')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Description Four<span class="error">*</span></label>
                                    <input type="text" name="description_four" class="form-control" required=""
                                           value="{{ old('description_four') }}">
                                    @error('description_four')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Certification<span class="error">*</span></label>
                                    <input type="text" name="certification" class="form-control" required=""
                                           value="{{ old('certification') }}">
                                    @error('certification')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Grade<span class="error">*</span></label>
                                    <input type="text" name="grade" class="form-control" required=""
                                           value="{{ old('grade') }}">
                                    @error('grade')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Exp.<span class="error">*</span></label>
                                    <input type="text" name="exp" class="form-control" required=""
                                           value="{{ old('exp') }}">
                                    @error('exp')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Auto Grade<span class="error">*</span></label>
                                    <input type="text" name="auto_grade" class="form-control" required=""
                                           value="{{ old('auto_grade') }}">
                                    @error('auto_grade')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 offset-md-6 col-md-6">
                                <div class="text-end">
                                    <button class="btn btn-primary waves-effect waves-lightml-2 me-2" type="submit">
                                        <i class="fa fa-save"></i> Save
                                    </button>

                                    <a class="btn btn-secondary waves-effect" href="{{ route('admin.label.index') }}">
                                        <i class="fa fa-times"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')

@endpush

