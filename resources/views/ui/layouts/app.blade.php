<!DOCTYPE html>
<html lang="en">
	<head>
		@include('ui.layouts.parts.head')
	</head>
	<body>
        {{ $slot }}

        @include('ui.layouts.parts.scripts')
	</body>
</html>
