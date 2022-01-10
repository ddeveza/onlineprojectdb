const WeeklyDates = (props) => {
  const { toggle } = props;
  return (
    <React.Fragment>
      {toggle && (
        <div style={props.divStyle}>
          <label htmlFor={props.statusDateName}>{props.title}</label>
          <input
            key={props.statusDateName}
            id={props.statusDateName}
            type="date"
            value={`${props.statusDate}`}
            onChange={(e) => {
              props.onDateChangeHandler(props.statusDateName, e.target.value);
            }}
          />
        </div>
      )}
    </React.Fragment>
  );
};

const ProjectDates = () => {
  const [projectStatus, setProjectStatus] = React.useState("Incoming...");
  const [min, setMin] = React.useState(0);

  //Dates States
  const [projectDates, setProjectDates] = React.useState({
    incoming: { toggleProgress: false, completedDate: "" },
    rpDate: { toggleProgress: false, completedDate: "" },
    bin1Date: { toggleProgress: false, completedDate: "" },
    qualDate: { toggleProgress: false, completedDate: "" },
    cabDate: { toggleProgress: false, completedDate: "" },
    ecoDateSubmit: { toggleProgress: false, completedDate: "" },
    ecoDateReleased: { toggleProgress: false, completedDate: "" },
  });

  //End of Date States

  const [id, setID] = React.useState("");

  const dateStyle = {
    display: "flex",
    flexDirection: "column",
  };

  const handleChange = (e) => {
    e.preventDefault();
    switch (e.target.value) {
      case "0": {
        setProjectStatus("Incoming...");
        setMin(e.target.value);
        break;
      }
      case "1": {
        setProjectStatus("Received Test Package");
        setProjectDates((prev) => {
          return { ...prev, rpDate: { title: "Test Package Received", toggleProgress: true } };
        });
        setMin(e.target.value);
        break;
      }
      case "2": {
        setProjectStatus("Bin 1 Completed");
        setProjectDates((prev) => {
          return { ...prev, bin1Date: { title: "Bin1 Completed", toggleProgress: true } };
        });
        setMin(e.target.value);
        break;
      }
      case "3": {
        setProjectStatus("Qual Phase Completed");
        setProjectDates((prev) => {
          return { ...prev, qualDate: { title: "Qualification Completed", toggleProgress: true } };
        });
        setMin(e.target.value);
        break;
      }
      case "4": {
        setProjectStatus("Cab Approved");
        setProjectDates((prev) => {
          return { ...prev, cabDate: { title: "Cab Approved Date", toggleProgress: true } };
        });
        setMin(e.target.value);
        break;
      }
      case "5": {
        setProjectStatus("ECO Submitted");
        setProjectDates((prev) => {
          return { ...prev, ecoDateSubmit: { title: "ECO Submitted Date", toggleProgress: true } };
        });
        setMin(e.target.value);
        break;
      }
      case "6": {
        setProjectStatus("ECO Released");
        setProjectDates((prev) => {
          return { ...prev, ecoDateReleased: { title: "ECO Released Date", toggleProgress: true } };
        });
        setMin(e.target.value);
        break;
      }
    }
  };

  React.useEffect(() => {
    const getID = () => {
      let newID = $("#ProjectID").val();
      setID((prev) => newID);
    };
    $(document).on("click", "#AddWarBtn", getID);
  }, []);
  ///axios to READ DATA FROM THE SEVER
  React.useEffect(() => {
    if (id) {
      //read current date
      axios.post("MyPhp/api_dates/read_dates.php", { id: id }).then(async (res) => {
        console.log(res.data);
        setMin((prev) => 0);
        let progress = 0;

        for (const key in res.data) {
          if (res.data[key] !== null) {
            progress += 1;
          }
        }

        setMin((prev) => (progress ? progress : prev));

        setProjectDates((prev) => {
          return {
            ...prev,
            rpDate: { toggleProgress: res.data.rpDate !== null ? true : false, completedDate: res.data.rpDate },
            bin1Date: { toggleProgress: res.data.bin1Date !== null ? true : false, completedDate: res.data.bin1Date },
            qualDate: { toggleProgress: res.data.qualDate !== null ? true : false, completedDate: res.data.qualDate },
            cabDate: { toggleProgress: res.data.cabDate !== null ? true : false, completedDate: res.data.cabDate },
            ecoDateSubmit: { toggleProgress: res.data.ecoSubmittedDate !== null ? true : false, completedDate: res.data.ecoSubmittedDate },
            ecoDateReleased: { toggleProgress: res.data.ecoReleasedDate !== null ? true : false, completedDate: res.data.ecoReleasedDate },
          };
        });
      });
    }

    return () => {
      setProjectDates((prev) => {
        return {
          incoming: { toggleProgress: false, completedDate: "" },
          rpDate: { toggleProgress: false, completedDate: "" },
          bin1Date: { toggleProgress: false, completedDate: "" },
          qualDate: { toggleProgress: false, completedDate: "" },
          cabDate: { toggleProgress: false, completedDate: "" },
          ecoDateSubmit: { toggleProgress: false, completedDate: "" },
          ecoDateReleased: { toggleProgress: false, completedDate: "" },
        };
      });
    };
  }, [id]);

  React.useEffect(() => {
    saveDates = (ids, dates) => {
      axios
        .post("MyPhp/api_dates/save_dates.php", { id: ids, dates: dates })
        .then((res) => console.log(res.data))
        .catch((err) => console.log(err));
    };
    $("#save").click(() => saveDates(id, projectDates));
    return () => {
      $("#save").unbind();
    };
  }, [id, projectDates]);

  const divStyle = { display: "flex", justifyContent: "space-between", width: "360px" };
  onDateChangeHandler = (title, date) => {
    switch (title) {
      case "rpDate": {
        setProjectDates((prev) => {
          return { ...prev, rpDate: { ...prev.rpDate, completedDate: date } };
        });
        break;
      }
      case "bin1Date": {
        setProjectDates((prev) => {
          return { ...prev, bin1Date: { ...prev.bin1Date, completedDate: date } };
        });
        break;
      }
      case "qualDate": {
        setProjectDates((prev) => {
          return { ...prev, qualDate: { ...prev.qualDate, completedDate: date } };
        });
        break;
      }
      case "cabDate": {
        setProjectDates((prev) => {
          return { ...prev, cabDate: { ...prev.cabDate, completedDate: date } };
        });
        break;
      }
      case "ecoSubmittedDate": {
        setProjectDates((prev) => {
          return { ...prev, ecoDateSubmit: { toggleProgress: true, completedDate: date } };
        });
        break;
      }
      case "ecoReleasedDate": {
        setProjectDates((prev) => {
          return { ...prev, ecoDateReleased: { toggleProgress: true, completedDate: date } };
        });
        break;
      }
    }
  };
  return (
    <div style={{ margin: "auto", padding: "0 20px 0 20px" }}>
      <div>
        <small>
          <u>*Note: Hover on each project phase for more info or details.</u>
        </small>
      </div>
      <input type="range" list="tickmarks" min={0} max={6} step={1} value={min} onChange={(e) => handleChange(e)} style={{ cursor: "pointer" }} />
      <datalist id="tickmarks">
        <option value="0" />
        <option value="1" />
        <option value="2" />
        <option value="3" />
        <option value="4" />
        <option value="5" />
        <option value="6" />
      </datalist>

      <div style={{ display: "flex", flexDirection: "row", justifyContent: "space-between", textAlign: "center" }}>
        <div style={{ width: "60px" }} data-toggle="tooltip" data-placement="top" title="Incoming stage is wherein waiting for the test package to arrive in OSPI.">
          Incoming
        </div>
        <div style={{ width: "60px", alignItems: "end" }} data-toggle="tooltip" data-placement="top" title="Test Package is already received in OSPI (LB,Sockets, TP and etc....)">
          Test Package Received
        </div>
        <div style={{ width: "60px" }} data-toggle="tooltip" data-placement="top" title="Bin1 repeatability is OK for ALL SITES (Test Acceptance Completed)">
          Bin1(Full Sites)
        </div>
        <div style={{ width: "60px" }} data-toggle="tooltip" data-placement="top" title="Qualification data is completed and all issues are resolved.(XCorr,GRR,LB Compliance  and etc...)">
          Qualification Completed
        </div>
        <div style={{ width: "60px" }} data-toggle="tooltip" data-placement="top" title="CAB info book is presented and approved.">
          Cab Approved Date
        </div>
        <div style={{ width: "60px" }} data-toggle="tooltip" data-placement="top" title="ECO is under 'FOR APPROVAL' status in Agile.(TP release, Adding OSPI  as Test Location and etc...)">
          ECO Submitted
        </div>
        <div style={{ width: "60px" }} data-toggle="tooltip" data-placement="top" title="ECO  is published and implemented status in agile.">
          ECO Released
        </div>
      </div>

      <div style={dateStyle}>
        <h3>Dates:</h3>
        <WeeklyDates title={"Test Packaged Received"} toggle={projectDates.rpDate.toggleProgress} divStyle={divStyle} statusDateName="rpDate" statusDate={`${projectDates.rpDate.completedDate}`} onDateChangeHandler={onDateChangeHandler} />
        <WeeklyDates title={"Bin1 Completed"} toggle={projectDates.bin1Date.toggleProgress} divStyle={divStyle} statusDateName="bin1Date" statusDate={`${projectDates.bin1Date.completedDate}`} onDateChangeHandler={onDateChangeHandler} />
        <WeeklyDates title={"Qualification Date"} toggle={projectDates.qualDate.toggleProgress} divStyle={divStyle} statusDateName="qualDate" statusDate={`${projectDates.qualDate.completedDate}`} onDateChangeHandler={onDateChangeHandler} />
        <WeeklyDates title={"Cab Approved Date"} toggle={projectDates.cabDate.toggleProgress} divStyle={divStyle} statusDateName="cabDate" statusDate={`${projectDates.cabDate.completedDate}`} onDateChangeHandler={onDateChangeHandler} />
        <WeeklyDates title={"ECO Submitted Date"} toggle={projectDates.ecoDateSubmit.toggleProgress} divStyle={divStyle} statusDateName="ecoSubmittedDate" statusDate={`${projectDates.ecoDateSubmit.completedDate}`} onDateChangeHandler={onDateChangeHandler} />
        <WeeklyDates title={"ECO Released Date"} toggle={projectDates.ecoDateReleased.toggleProgress} divStyle={divStyle} statusDateName="ecoReleasedDate" statusDate={`${projectDates.ecoDateReleased.completedDate}`} onDateChangeHandler={onDateChangeHandler} />
      </div>
    </div>
  );
};

ReactDOM.render(<ProjectDates />, document.getElementById("root"));
