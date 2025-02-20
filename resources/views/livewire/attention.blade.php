<div>
    <div class="container mx-auto p-6">
        <!-- Fila 1 -->
        <div class="grid grid-cols-3 gap-6 items-center mb-4">
            <div>
                <p class="font-semibold">Nombre</p>
                <p>{{ $appointment->patient->name }}</p>
            </div>
            <div>
                <p class="font-semibold"># Historia</p>
                <p>{{ $appointment->id }}</p>
            </div>
            <div>
                <p class="font-semibold">Fecha</p>
                <p>{{ \Carbon\Carbon::parse($appointment->start_time)->format('d/m/Y') }}</p>
            </div>
        </div>

        <!-- Fila 2 -->
        <div class="mb-4" wire:ignore>
            <p class="font-semibold mb-2">Detalles</p>
            <textarea id="clinical_notes_editor" class="w-full border rounded-lg p-2 focus:outline-none" wire:model="clinical_notes"></textarea>
        </div>
        
        
        <div>
            @if (session()->has('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        

        <!-- Fila 3 -->
        <div class="text-right">
            <button 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300"
                wire:click="saveNotes"
            >
                Guardar
            </button>
        </div>
    </div>

   @script
    <script>
            tinymce.init({
                selector: '#clinical_notes_editor', // ID del textarea
                plugins: [
                    // Core editing features
                    'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                    // Your account includes a free trial of TinyMCE premium features
                    // Try the most popular premium features until Jan 20, 2025:
                    'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown','importword', 'exportword', 'exportpdf'
                    ],
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                menubar: false,
                height: 300,
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
            
                setup: function (editor) {
                    editor.on('change', function () {
                        @this.set('document', editor.getContent());
                        
                    });
                }
            });
        </script>
        @endscript
        


</div>