<div class="my-2" x-data="inputForHandler()">
    <template x-for="(field,i) in fields" :key="i">
        <div class="w-full flex-my-2">
            <label :for="field.id" class="border border-gray-200 rounded-md p-2 w-full bg-white cursor-pointer">
                <input type="file" accept="image/*" class="sr-only" :id="field.id" name="images[]" @change="fields[i].file = $event.target.files[0]">
                <span x-text="field.file ? field.file.name:'画像を選択'" class="text-gray-500"></span>
            </label>
            <button type="reset" @click="removeField(i)" class="p-2">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>

            </button>
        </div>

    </template>
    <template x-if="fields.length < 4">
        <button type="button" @click="addField()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500">
            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <span>画像を追加</span>
        </button>
    </template>

</div>

<script>
    function inputForHandler() {
        return {
            fields: [],
            addField() {
                const i = this.fields.length;
                this.fields.push({
                    file: '',
                    id: `input-image-${i}`
                });
            },
            removeField(index){
                this.fields.splice(index, 1);

            }
        }


    }

</script>
