@props(['id' => '', 'title' => '', 'data' => '', 'selectedvalues' => '', 'checkboxClass', 'id_key', 'value_key'])

<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content dark:bg-gray-800 dark:border-gray-700">
            <div class="modal-header dark:border-gray-700">
                <button type="button" class="close dark:text-gray-400" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title dark:text-white" id="{{$id}}Label">{{$title}}</h4>
            </div>
            <div class="modal-body dark:text-gray-300">
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
            <div class="modal-footer dark:border-gray-700">
                <button type="button" class="btn btn-dark dark:bg-gray-600 dark:border-gray-500" data-dismiss="modal">{{$title}}</button>
            </div>
        </div>
    </div>
</div>