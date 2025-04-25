@props(['id' => '', 'title' => '', 'data' => '', 'selectedvalues' => '', 'checkboxClass', 'id_key', 'value_key'])

<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="{{$id}}Label">{{$title}}</h4>
            </div>
            <div class="modal-body">
                @foreach ($data as $row)
                    <div class="checkbox">
                        <label>
                            <input 
                                type="checkbox" 
                                class="{{$checkboxClass}}"
                                name="{{$id}}-{{ $row->$id_key }}"
                                id="{{$id}}-{{ $row->$id_key }}"
                                value="{{ $row->$id_key }}" {{in_array($row->$id_key, $selectedvalues) ? 'checked': ''}}>
                            {{ $row->$id_key }} - {{ $row->$value_key }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">{{$title}}</button>
            </div>
        </div>
    </div>
</div>