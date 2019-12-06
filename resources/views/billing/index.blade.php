@extends('_layouts.default')
@section('content')
<div class="pricing-table clearfix">
	<ul class="highlight-low">
		<li class="heading">One Month Access</li>
		<li class="price">$10</li>
		<li class="call-to-action"><a href="{{ route('buy') }}">Buy Now</a></li>
	</ul>
	<ul class="highlight-low">
		<li class="heading">Two Months Access</li>
		<li class="price">$15</li>
		<li class="call-to-action"><a href="{{ route('buy') }}">Buy Now</a></li>
	</ul>
	<ul class="highlight-low">
		<li class="heading">Three Months Access</li>
		<li class="price">$20</li>
		<li class="call-to-action"><a href="{{ route('buy') }}">Buy Now</a></li>
	</ul>
	<ul class="highlight-high">
		<li class="heading">One Year Access</li>
		<li class="price">$50</li>
		<li class="call-to-action"><a href="{{ route('buy') }}">Buy Now</a></li>
	</ul>
	<ul class="highlight-medium">
		<li class="heading">Two Years Access</li>
		<li class="price">$75</li>
		<li class="call-to-action"><a href="{{ route('buy') }}">Buy Now</a></li>
	</ul>
	<ul class="highlight-medium">
		<li class="heading">Three Years Access</li>
		<li class="price">$100</li>
		<li class="call-to-action"><a href="{{ route('buy') }}">Buy Now</a></li>
	</ul>
	<ul class="highlight-medium">
		<li class="heading">Life-Time Access</li>
		<li class="price">$500</li>
		<li class="call-to-action"><a href="{{ route('buy') }}">Buy Now</a></li>
	</ul>
</div>
@stop

@section('style')
<style type="text/css">
	.pricing-table {
  margin: 30px auto 30px auto;
  font-family:"Arial";
}
.pricing-table ul {
  width: 14.4%;
  text-align: center;
  background: #fff;
  float: left;
  margin: 0px;
  padding: 0px;
  list-style: none;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  z-index: 99;
  position: relative;
}
.pricing-table ul.highlight-low {
  margin-right: -5px;
}
.pricing-table ul.highlight-low .heading {
  font-size: 17px;
  padding: 15px 0;
  border: 5px solid #cfcfcf;
  -webkit-border-radius: 5px 5px 0 0;
  -moz-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
  background-color: #e3e3e3;
  background-image: -moz-linear-gradient(top, #f0f0f0, #cfcfcf);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f0f0f0), to(#cfcfcf));
  background-image: -webkit-linear-gradient(top, #f0f0f0, #cfcfcf);
  background-image: -o-linear-gradient(top, #f0f0f0, #cfcfcf);
  background-image: linear-gradient(to bottom, #f0f0f0, #cfcfcf);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff0f0f0', endColorstr='#ffcfcfcf', GradientType=0);
}
.pricing-table ul.highlight-low .price {
  background: #dfe9f0;
  border-left: 5px solid #cfcfcf;
  border-right: 5px solid #cfcfcf;
  font-size: 20px;
  padding: 15px 0;
}
.pricing-table ul.highlight-low .feature {
  border-left: 5px solid #cfcfcf;
  border-right: 5px solid #cfcfcf;
}
.pricing-table ul.highlight-low .feature span {
  padding: 10px 0;
  border-bottom: 1px dashed rgba(0, 0, 0, 0.2);
  margin: 0 10px;
  display: block;
  font-size: 90%;
}
.pricing-table ul.highlight-low .feature:nth-last-child(2) span {
  border-bottom: 0px !important;
}
.pricing-table ul.highlight-low .call-to-action {
  background: #f0f0f0;
  -webkit-border-radius: 0 0 5px 5px;
  -moz-border-radius: 0 0 5px 5px;
  border-radius: 0 0 5px 5px;
  border: 5px solid #cfcfcf;
  border-top: 0px;
  padding: 15px 0;
  font-size: 22px;
}
.pricing-table ul.highlight-high {
  z-index: 100;
  -webkit-box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  margin-top: -12px;
}
.pricing-table ul.highlight-high .heading {
  font-size: 17px;
  padding: 24px 0;
  border: 5px solid #21507d;
  -webkit-border-radius: 5px 5px 0 0;
  -moz-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
  background-color: #2c5d8e;
  background-image: -moz-linear-gradient(top, #336699, #21507d);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#336699), to(#21507d));
  background-image: -webkit-linear-gradient(top, #336699, #21507d);
  background-image: -o-linear-gradient(top, #336699, #21507d);
  background-image: linear-gradient(to bottom, #336699, #21507d);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff336699', endColorstr='#ff21507d', GradientType=0);
  color: #fff;
}
.pricing-table ul.highlight-high .price {
  background: #dfe9f0;
  border-left: 5px solid #21507d;
  border-right: 5px solid #21507d;
  font-size: 20px;
  padding: 15px 0;
}
.pricing-table ul.highlight-high .feature {
  border-left: 5px solid #21507d;
  border-right: 5px solid #21507d;
}
.pricing-table ul.highlight-high .feature span {
  padding: 10px 0;
  border-bottom: 1px dashed rgba(0, 0, 0, 0.2);
  margin: 0 10px;
  display: block;
  font-size: 90%;
}
.pricing-table ul.highlight-high .feature:nth-last-child(2) span {
  border-bottom: 0px !important;
}
.pricing-table ul.highlight-high .call-to-action {
  background: #f0f0f0;
  -webkit-border-radius: 0 0 5px 5px;
  -moz-border-radius: 0 0 5px 5px;
  border-radius: 0 0 5px 5px;
  border: 5px solid #21507d;
  border-top: 0px;
  padding: 24px 0;
  font-size: 22px;
}
.pricing-table ul.highlight-medium {
  margin-left: -5px;
}
.pricing-table ul.highlight-medium .heading {
  font-size: 17px;
  padding: 15px 0;
  border: 5px solid #9f950c;
  -webkit-border-radius: 5px 5px 0 0;
  -moz-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
  background-color: #9f940c;
  background-image: -moz-linear-gradient(top, #cccf16, #9f940c);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#cccf16), to(#9f940c));
  background-image: -webkit-linear-gradient(top, #cccf16, #9f940c);
  background-image: -o-linear-gradient(top, #cccf16, #9f940c);
  background-image: linear-gradient(to bottom, #cccf16, #9f940c);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff76cf16', endColorstr='#ff9e950c', GradientType=0);
  color: #fff;
}
.pricing-table ul.highlight-medium .price {
  background: #dfe9f0;
  border-left: 5px solid #9e950c;
  border-right: 5px solid #9e950c;
  font-size: 20px;
  padding: 15px 0;
}
.pricing-table ul.highlight-medium .feature {
  border-left: 5px solid #9e950c;
  border-right: 5px solid #9e950c;
}
.pricing-table ul.highlight-medium .feature span {
  padding: 10px 0;
  border-bottom: 1px dashed rgba(0, 0, 0, 0.2);
  margin: 0 10px;
  display: block;
  font-size: 90%;
}
.pricing-table ul.highlight-medium .feature:nth-last-child(2) span {
  border-bottom: 0px !important;
}
.pricing-table ul.highlight-medium .call-to-action {
  background: #f0f0f0;
  -webkit-border-radius: 0 0 5px 5px;
  -moz-border-radius: 0 0 5px 5px;
  border-radius: 0 0 5px 5px;
  border: 5px solid #9e950c;
  border-top: 0px;
  padding: 15px 0;
  font-size: 22px;
}
</style>
@stop
