function openForm() {
  document.getElementById("myform").style.display = "block";
}

function closeForm() {
  document.getElementById("myform").style.display = "none";
}

const form = document.querySelector("#storeForm");
form.addEventListener("submit", (e) => {
  const shopName = document.getElementById('shopName');
  const address = document.getElementById('address');
  const phoneNumber = document.getElementById('phoneNumber');
  const date = document.getElementById('date');
  const month = document.getElementById('month');
  const year = document.getElementById('year');

  let messages = [];

  if (shopName.value.trim() === '') messages.push('Store name is required.');
  if (address.value.trim() === '') messages.push('Address is required.');
  if (phoneNumber.value.trim() === '') messages.push('Phone number is required.');
  if (date.value.trim() === '') messages.push('Date is required.');
  if (month.value.trim() === '') messages.push('Month is required.');
  if (year.value.trim() === '') messages.push('Year is required.');

  if (messages.length > 0) {
    e.preventDefault();
    alert(messages.join('\n'));
  }
});