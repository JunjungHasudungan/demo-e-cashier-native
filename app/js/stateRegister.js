function stateRegister() {
    return {
        user: { name: '', password: '', password_confirmation: '', email: ''},
        errors: {name: '', password: '', password_confirmation: '', email: ''},
        fieldLabels: { 
            name: 'Nama', 
            password: 'Password',
            password_confirmation: 'Password Confirmation',
            email: 'Email'
        },
        isValid: false,
 
        resetErrors(){
            Object.assign(this.errors, {
                password: '',password_confirmation: '', email: ''
            })
        },
        async sendDataRegister() {
            try {
                this.isValid = true;
                for (let key in this.user) {
                    if (!this.user[key].toString().trim()) {
                        let label  = this.fieldLabels[key] || key;
                            this.errors[key] = `${label} tidak boleh kosong`;
                            this.isValid = false;
                    }else {
                        this.errors[key] = '';
                    }
                }
                if (!this.isValid) return

                if(this.user.password != this.user.password_confirmation) {
                    this.errors.password_confirmation = "Konfirmasi password tidak cocok";
                    return;
                }

                let dataUser = {
                    name: this.user.name,
                    password: this.user.password,
                    email: this.user.email,
                }
                const response = await axios.post('/demo-e-cashier-native/app/services/auth/register.php', 
                    dataUser, {
                            headers: {
                                'Content-Type': 'application/json'
                            }
                });

                    if (response.status === 201) {
                    // opsional tampilkan pesan
                    console.log(response.data.message);

                    // redirect ke halaman sesuai role
                    window.location.href = response.data.redirect;
                }
    
            } catch (error) {
                if(error.response.status == 409) {
                    this.errors.email =  error.response.data.message;
                }
            }
        }
    }
}