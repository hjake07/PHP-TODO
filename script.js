let hidden = true;
function toggleShown(id){
if(hidden){
    hidden = false;
    document.getElementById(id).classList = "shown";

}
else {
    document.getElementById(id).classList = "hidden";
    hidden = true;
}
}

// const getTimelineURL = "https://api.tomorrow.io/v4/timelines";
// const apikey = 'tMKIPltH5UqPBiN7WZ2pJ5hVMnkmwCz5';
// let location = [37.751, -97.82];
// const fields = [
//     "precipitationIntensity",
//     "precipitationType",
//     "windSpeed",
//     "windGust",
//     "windDirection",
//     "temperature",
//     "temperatureApparent",
//     "cloudCover",
//     "cloudBase",
//     "cloudCeiling",
//     "weatherCode",
//   ];
//   const units = "imperial";
//   const timesteps = ["current", "1h", "1d"];
//   const now = moment.utc();
// const startTime = moment.utc(now).add(0, "minutes").toISOString();
// const endTime = moment.utc(now).add(1, "days").toISOString();
// const timezone = "America/Denver";
// const getTimelineParameters =  queryString.stringify({
//     apikey,
//     location,
//     fields,
//     units,
//     timesteps,
//     startTime,
//     endTime,
//     timezone,
// }, {arrayFormat: "comma"});

// fetch(getTimelineURL + "?" + getTimelineParameters, {method: "GET", compress: true})
//   .then((result) => result.json())
//   .then((json) => console.log(json)
//   .catch((error) => console.error("error: " + err)));

