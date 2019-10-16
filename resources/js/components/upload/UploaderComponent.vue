<template>
	<div class="container mx-auto px-4">
		<div class="flex">
			<div class="w-1/3 mb-3">
				<card class>
					<heading>Upload Excel file</heading>
					<file-pond
						name="file"
						ref="file"
						label-idle="Drop files here..."
						v-bind:allow-multiple="true"
						maxFileSize="12MB"
						accepted-file-types="image/jpeg, image/jpg,"
						server="https://mailsender.test/api/upload"
						v-bind:files="myFiles"
						v-on:init="handleFilePondInit"
						@processfile="getFile"
						@removefile="removeFile"
					/>
					<text-input v-model="excel.filename" label="Filename" class="mb-3"></text-input>
					<button
						class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
						@click.prevent="store"
					>Save file</button>
				</card>
			</div>
			<div class="w-2/3 px-2">
				<card :is-padding="false">
					<template v-if="excels.length > 0">
						<basic-table :headings="tableHeadings">
							<tr
								v-for="(excel, excelIndex) in excels"
								:key="excelIndex"
								class="hover:bg-grey-lightest focus-within:bg-grey-lightest"
							>
								<td class="border-t">
									<span
										class="text-gray-700 px-6 py-4 flex items-center focus:text-indigo"
									>{{ excel.filename }}</span>
								</td>

								<td class="border-t text-center" @click="deleteFileRecords(excel.id)">Delete</td>
							</tr>
						</basic-table>
					</template>
					<template v-else>
						<div class="py-16 px-4 text-center">
							<heading class="mb-4">No file available here</heading>
						</div>
					</template>
				</card>
			</div>
		</div>
	</div>
</template>

<script>
	import Card from "../tuis/Card";
	import TextInput from "../tuis/TextInput";
	import Heading from "../tuis/Heading";
	import vueFilePond from "vue-filepond";
	import "filepond/dist/filepond.min.css";
	import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
	const FilePond = vueFilePond(FilePondPluginFileValidateType);

	export default {
		components: {
			FilePond,
			Card,
			Heading,
			TextInput
		},
		data() {
			return {
				myFiles: [],
				images: [],
				excel: {
					filename: "",
					status: ""
				},
				excels: []
			};
		},
		mounted() {
			this.getFileRecords();
		},
		methods: {
			handleFilePondInit: function() {
				console.log("FilePond has initialized");
			},
			getFile(error, file) {
				console.log(file.filename);
				console.log(file.serverId);
				this.images.push({
					filename: file.filename,
					serverId: file.serverId
				});
			},

			removeFile(nullValue, file) {
				console.log(file.filename);
				let foundImage = this.images.findIndex(
					image => image.filename === file.filename
				);
				console.log(foundImage);
				if (foundImage != -1) {
					this.images.splice(foundImage, 1);
				}
			},
			store() {
				axios
					.post("/file", {
						filename: this.excel.filename,
						filepath: this.images
					})
					.then(res => {
						console.log(res.data);
						this.excel.filename = "";
						this.images = [];
						this.myFiles = [];
						this.getFileRecords();
					})
					.catch(err => {
						console.log(err.response.data.errors);
					});
			},
			getFileRecords() {
				axios
					.get("/file")
					.then(res => {
						this.excels = res.data.data;
					})
					.catch();
			},
			deleteFileRecords(file) {
				axios
					.delete(`/file/${file}`)
					.then(res => {
						// this.excels = res.data.data;
						this.getFileRecords();
						console.log("delete", file);
					})
					.catch();
			}
		}
	};
</script>

<style>
</style>