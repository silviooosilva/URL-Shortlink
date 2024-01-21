<script>
import InfoProfile from '../components/InfoProfile.vue'
import SecurityProfile from '../components/SecurityProfile.vue'
import ProfilePhoto from '../components/ProfilePhoto.vue'
import Buttom from '../components/Buttom.vue'

export default {
  components:{
    InfoProfile,
    SecurityProfile,
    ProfilePhoto,
    Buttom
  },
  methods: {
    showAccount(){
      this.$refs.inputAccount.style.display = 'block'
      this.$refs.inputSecurity.style.display = 'none'
    },
    showSecurity(){
      this.$refs.inputAccount.style.display = 'none'
      this.$refs.inputSecurity.style.display = 'block'
    },
    enableAcccount(){
      this.$refs.name.disabled = false
      this.$refs.email.disabled = false
      this.$refs.password.disabled = false
      this.$refs.editAccount.style.display = 'none'
      this.$refs.saveAccount.style.display = 'flex'
      this.$refs.name.style.backgroundColor = 'transparent'
      this.$refs.email.style.backgroundColor = 'transparent'
      this.$refs.password.style.backgroundColor = 'transparent'
    },
    disabledAccount(){
      this.$refs.name.disabled = true
      this.$refs.email.disabled = true
      this.$refs.password.disabled = true
      this.$refs.editAccount.style.display = 'flex'
      this.$refs.saveAccount.style.display = 'none'
      this.$refs.name.style.backgroundColor = 'rgb(226 232 240)'
      this.$refs.email.style.backgroundColor = 'rgb(226 232 240)'
      this.$refs.password.style.backgroundColor = 'rgb(226 232 240)'
    }
  }
}

</script>

<template>

    <!-- component -->
<div class="w-10/12 mx-auto mt-16 max-w-6xl">
  <div class="lg:col-start-2 col-span-12 lg:col-span-10 grid grid-cols-6 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 mx-auto">
    <div class="p-4 col-span-6 md:col-span-2 ">
        <div class="grid grid-cols-5">
          
          <InfoProfile @click="showAccount" />

          <SecurityProfile @click="showSecurity" />

        </div>
    </div>

    <!-- Account Information-->
    <div ref="inputAccount" class="p-4 col-span-6 md:col-span-4">
      <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-10">
        <div class="col-span-1 sm:col-span-1">
          <ProfilePhoto />
        </div>

        <div class="col-span-4 my-auto sm:col-span-1">
          <div class="mb-5">
            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Seu nome</label>
            <div class="mt-2">
              <input ref="name" disabled type="text" name="last-name" id="last-name" autocomplete="family-name" class="block bg-slate-200 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div class="mb-5">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Seu email</label>
            <div class="mt-2">
              <input ref="email" disabled id="email" name="email" type="email" autocomplete="email" class="block w-full bg-slate-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div>
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Confirmar senha</label>
            <div class="mt-2">
              <input ref="password" disabled id="password" name="password" type="password" autocomplete="password" class="block w-full bg-slate-200 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>

      </div>

      <div ref="editAccount" class="mt-6 flex items-center justify-end gap-x-6">
        <Buttom text="Editar" @click="enableAcccount"/>  
      </div>

      <div ref="saveAccount" class="mt-6 flex items-center justify-end gap-x-6 hidden">
        <button @click="disabledAccount" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
        <Buttom text="Salvar" />  
      </div>
    </div>

    <!-- Securit Information -->
    <div ref="inputSecurity" class="p-4 col-span-4 md:col-span-4 hidden max-w-sm">
        <div class="mx-auto grid">
            <div class="col-span-2 my-auto sm:col-span-1">
              <div class="mb-5">
                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Senha atual</label>
                <div class="mt-2">
                  <input type="password" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
              <div class="mb-5">
                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Nova senha</label>
                <div class="mt-2">
                  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>

              <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Confirmar nova senha</label>
                <div class="mt-2">
                  <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
              </div>
            </div>

          </div>

          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
            <!--button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
            -->
            <Buttom text="Salvar" />
          </div>
      </div>
  </div>
</div>

</template>