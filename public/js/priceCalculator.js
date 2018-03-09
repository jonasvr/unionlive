var TypeEnum = Object.freeze({"audio":30, "visual":30, "audiovisual":60})
var PeriodEnum = Object.freeze({"day":1, "week":7, "month":30, "season":90, "semester":180, "year":360})
var PeriodRatioEnum = Object.freeze({"day":0, "week":5, "month":10, "season":20, "semester":30, "year":40})
var RatioEnum = Object.freeze({"ten":1, "fifteen":1.1, "twenty":1.25, "twentyfive":1.35, "thirty":1.5})

class Calculator {
  constructor() {
    this.type = TypeEnum.audio
    this.period = PeriodEnum.day
    this.periodRatio = PeriodRatioEnum.day
    this.ratio = RatioEnum.ten
  }

  typeUpdate(type) {
    this.type = type;
    return this.calcTotalPrice();
  }

  periodUpdate(period) {
    this.period = PeriodEnum[period];
    this.periodRatio = PeriodRatioEnum[period];
    return this.calcTotalPrice();
  }

  durationUpdate(duration) {
    this.ratio = RatioEnum[duration];
    return this.calcTotalPrice();
  }

  get numberOfAds() {
    return this.calcNOA();
  }

  get pricePerAd() {
    return this.calcPPA();
  }

  get totalPrice() {
    return this.calcTotalPrice();
  }

  // Number of Ads
  calcNOA() {
    var result = this.period;
    $("#number-of-ads").html(result);
    return result;
  }

  // Price per Add
  calcPPA() {
    var result = this.type * this.ratio * ((100 - this.periodRatio)/100);
    result = Math.round(result);
    $("#price-per-ad").html(result);
    return result;
  }

  // Total Price
  calcTotalPrice() {
    var result = this.calcPPA() * this.calcNOA();
    $("#total-price").html(result);
    return result;
  }
}
