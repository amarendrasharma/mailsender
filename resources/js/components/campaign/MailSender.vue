<template>
	<div>
		<div class="container mx-auto">
			<div class="w-1/2">
				<div class="mb-3">
					<select-input v-model="mail.templates" label="Select fruit" :options="options">
						<option value="null" disabled>Select template</option>
					</select-input>
				</div>
				<div class="mb-3">
					<label class="form-label block mb-1 font-semibold text-gray-700">Email</label>
					<textarea
						v-model="mail.emails"
						rows="20"
						class="w-full border-2 focus:border-blue-600 outline-none rounded-lg text-left"
						@input="validEmail"
						:class=" validEmail? 'border-red-400' : ''  "
					></textarea>
				</div>
				<div class="mb-3">
					<loading-button
						variant="primary"
						@click.prevent="submitMail"
						type="button"
						ref="mailsender"
					>Send Mail</loading-button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import TextInput from "../tuis/TextInput";
	import SelectInput from "../tuis/SelectInput";
	import LoadingButton from "../tuis/LoadingButton";
	export default {
		components: {
			TextInput,
			SelectInput,
			LoadingButton
		},
		props: ["listmailtemp"],
		data() {
			return {
				options: [],
				mail: {}
			};
		},
		mounted() {
			console.log(this.listmailtemp);
			this.listmailtemp.map(temp => {
				this.options.push({
					label: temp,
					value: temp
				});
			});
		},
		methods: {
			submitMail() {
				this.$refs.mailsender.startLoading();
				axios
					.post("/list-emails", this.mail)
					.then(res => {
						this.$refs.mailsender.stopLoading();
					})
					.catch(err => {
						this.$refs.mailsender.stopLoading();
					})
					.finally(() => {
						this.$refs.mailsender.stopLoading();
					});
				// : this.huanai();
			},

			validEmail() {
				return true;
				console.log("validEmail");
				var re = /^(\s?[^\s,]+@[^\s,]+\.[^\s,]+\s?,)*(\s?[^\s,]+@[^\s,]+\.[^\s,]+)$/;
				console.log(re.test(this.mail.emails));
				return re.test(this.mail.emails);
			},

			huanai() {
				alert("Emails are not in the right format or comma seperated");
				this.$refs.mailsender.stopLoading();
			},

			getEmailTemps() {
				this.axios
					.get("/list-emails")
					.then(res => {})
					.catch();
			}
		}
	};
</script>

<style>
</style>