<template>
  <div class="flex justify-center items-centers">
    <div class="w-full max-w-xl">
      <heading class="flex mb-3">Quick Menu</heading>
      <p class="text-90 leading-tight mb-8">
        จัดการธุรกิจของคุณ
      </p>

      <card>
        <table class="w-full" cellpadding="10" cellspacing="10">
          <tr>
            <td class="align-top w-1/2 border-r border-b border-50">
                <router-link
                    class="no-underline dim flex p-6"
                      :to="{
                        name: 'index',
                        params:{
                          resourceName: 'vendors'
                          },
                        }"
                      :title="ข้อมูลธุรกิจ">
                      <div class="flex justify-center w-11 flex-no-shrink mr-6">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="40"
                          height="40"
                          viewBox="0 0 40 40"
                        >
                          <path
                            fill="var(--primary)"
                            d="M29 7h5c.5522847 0 1 .44771525 1 1s-.4477153 1-1 1h-5v5c0 .5522847-.4477153 1-1 1s-1-.4477153-1-1V9h-5c-.5522847 0-1-.44771525-1-1s.4477153-1 1-1h5V2c0-.55228475.4477153-1 1-1s1 .44771525 1 1v5zM4 0h8c2.209139 0 4 1.790861 4 4v8c0 2.209139-1.790861 4-4 4H4c-2.209139 0-4-1.790861-4-4V4c0-2.209139 1.790861-4 4-4zm0 2c-1.1045695 0-2 .8954305-2 2v8c0 1.1.9 2 2 2h8c1.1045695 0 2-.8954305 2-2V4c0-1.1045695-.8954305-2-2-2H4zm20 18h8c2.209139 0 4 1.790861 4 4v8c0 2.209139-1.790861 4-4 4h-8c-2.209139 0-4-1.790861-4-4v-8c0-2.209139 1.790861-4 4-4zm0 2c-1.1045695 0-2 .8954305-2 2v8c0 1.1.9 2 2 2h8c1.1045695 0 2-.8954305 2-2v-8c0-1.1045695-.8954305-2-2-2h-8zM4 20h8c2.209139 0 4 1.790861 4 4v8c0 2.209139-1.790861 4-4 4H4c-2.209139 0-4-1.790861-4-4v-8c0-2.209139 1.790861-4 4-4zm0 2c-1.1045695 0-2 .8954305-2 2v8c0 1.1.9 2 2 2h8c1.1045695 0 2-.8954305 2-2v-8c0-1.1045695-.8954305-2-2-2H4z"
                          />
                        </svg>

                      </div>
                      <div>
                        <heading :level="3" class="mb-3">จัดการข้อมูลธุรกิจของคุณ</heading>
                          <p class="text-90 leading-normal">
                            เพิ่ม แก้ไข รายละเอียดข้อมูลธุรกิจ สินค้า โพส
                          </p>
                      </div>
              </router-link>
            </td>
            <td class="align-top w-1/2 border-r border-b border-50">
                <router-link
                    class="no-underline dim flex p-6"
                      :to="{
                        name: 'index',
                        params:{
                          resourceName: 'users'
                          },
                        }"
                      :title="ข้อมูลผู้ใช้">
                      <div class="flex justify-center w-11 flex-no-shrink mr-6">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          width="40"
                          height="40"
                          viewBox="0 0 20 20"
                        >
                         <path
                            fill="var(--primary)"
                            d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z"
                          />
                        </svg>
                      </div>
                      <div>
                        <heading :level="3" class="mb-3">ข้อมูลผู้ใช้</heading>
                          <p class="text-90 leading-normal">
                            แก้ไขรายละเอียดบัญชีผู้ใช้ของตัวเอง
                          </p>
                      </div>
              </router-link>
            </td>

          </tr>
        </table>
      </card>
    </div>
  </div>
</template>

<script>
export default {
  name: 'UserMenu',

  props: {
    card: Object,
  },


}
</script>
