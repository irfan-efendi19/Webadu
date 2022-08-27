window.onload = async () => {
  let bulan = [];
  let pending = [];
  let konfirmasi = [];
  let selesai = [];
  const response = await fetch("http://localhost:8080/admin/Api.php");
  const result = await response.json();
  result.forEach((element) => {
    bulan.push(element.y);
    pending.push(element.a);
    konfirmasi.push(element.b);
    selesai.push(element.c);
  });
  const data = {
    labels: bulan,
    datasets: [
      {
        label: "Pending",
        backgroundColor: "#f8b425",
        borderColor: "#f8b425",
        data: pending,
      },
      {
        label: "Konfirmasi",
        backgroundColor: "#38a4f8",
        borderColor: "#38a4f8",
        data: konfirmasi,
      },
      {
        label: "Selesai",
        backgroundColor: "#02a499",
        borderColor: "#02a499",
        data: selesai,
      },
    ],
  };

  const config = {
    type: "line",
    data: data,
    options: {},
  };
  const myChart = new Chart(document.getElementById("myChart"), config);
};
