#!/bin/bash
device=$(lsblk | grep rom | cut -d' ' -f1)
echo "$device"