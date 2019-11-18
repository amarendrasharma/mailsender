<template>
	<div>
		<div class="container mx-auto">
			<div class="flex justify-between">
				<div class="w-1/3">
					<div class="mb-3">
						<select-input v-model="mail.templates" label="Select Template" :options="options">
							<option value="null" disabled>Select template</option>
						</select-input>
					</div>

					<div class="mb-3">
						<input
							class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal"
							type="text"
							placeholder="Subject of email"
							v-model="mail.subject"
						/>
					</div>
				</div>
				<div class="w-2/3 px-2">
					<div class="mb-3">
						<label class="form-label block mb-1 font-semibold text-gray-700">Email</label>
						<textarea
							v-model="mail.emails"
							rows="25"
							class="w-full border-2 focus:border-blue-600 outline-none rounded-lg text-left px-3"
							@input="validEmail"
							:class="validEmail ? 'border-red-400' : ''"
						></textarea>
						<button @click="prittify">Click to make</button>
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
				mail: {
					emails: [
						{
							name: "Mithicher da",
							email: "mithicher.sumatoglobal@gmali.com"
						},
						{
							name: "Abhishek",
							email: "abhishek.sumatoglobal@gmali.com"
						}
					]
				}
			};
		},

		watch: {
			// mail: {
			// 	handler: function(newValue) {
			// 		newValue.emails = JSON.stringify(newValue, undefined, 4);
			// 		console.log(newValue);
			// 	},
			// 	deep: true
			// }
		},
		mounted() {
			console.log(this.listmailtemp);
			// this.listmailtemp.splice(0, 2);
			this.listmailtemp.map(temp => {
				this.options.push({
					label: temp,
					value: temp
				});
			});
		},
		methods: {
			prittify() {
				// let count = 0;listmailtemp
				let temp = this.mail.emails;
				this.mail.emails = JSON.stringify(this.mail.emails, undefined, 4);
				this.mail.emails = this.mail.emails.replace(/\r?\n/g, "\n");
				// count += 1;
				// if (count > 1) {
				// 	this.mail.emails = JSON.stringify(temp);
				// 	count = 0;
				// }
			},
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

<style></style>
